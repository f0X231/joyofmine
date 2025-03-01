<?php

namespace App\Http\Controllers\Authen;

use DateTime;
use DateTimeZone;
use Exception;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Crypt;

use App\Models\Users as usersModel;
use App\Models\Logs as logsModel;
use App\Models\Roles as rolesModel;
use App\Models\Authorization as authModel;
use App\Models\AuthorizationPage as authPageModel;


class AuthenticationController extends Controller
{
  public function index()
  {
    return view('authentications.login');
  }

  /*
  public function forgotPassword()
  {
    return view('authentications.forgot-password');
  }
*/

  public function authenLogin()
  {
    $date = new \DateTime("now", new \DateTimeZone("Asia/Bangkok"));
    $param = [];
    if(!empty($_POST)) {
        foreach ($_POST as $key => $value) {
            $param[$key] = $value;
        }
    }

    if(!empty($param) && !empty($param['usernameLogin']) && !empty($param['passwordLogin'])) 
    {
      $password = base64_encode(md5($param['passwordLogin']));
      $dataLogs = array('event' => 'Login', 'username' => $param['usernameLogin'], 'password' => $password);
      $jsonLogs = json_encode($dataLogs);

      $saveLogs = new logsModel;
      $saveLogs->eventname  = 'LOGIN';
      $saveLogs->log        = $jsonLogs;
      $saveLogs->created_at = $date->format('Y-m-d H:i:s');
      $saveLogs->save();

      $getUsers = usersModel::where([
                    ['username', '=', $param['usernameLogin']], 
                    ['password', '=', $password], 
                    ['is_active', '=', 'Y'], 
                    ['is_delete', '=', 'N']
                  ])->get()->toArray();
      if(!empty($getUsers)) {

        $saveLogs->eventname  = 'ACCESS';
        $saveLogs->log        = $jsonLogs;
        $saveLogs->created_at = $date->format('Y-m-d H:i:s');
        $saveLogs->save();

        $getRoles = rolesModel::where([['id', '=', $getUsers[0]['role_id']], ['is_active', '=', 'Y'], ['is_delete', '=', 'N']])->get()->toArray();
        $getPages = authPageModel::where([['is_active', '=', 'Y'], ['is_delete', '=', 'N']])->get()->toArray();
        $getAuth = authModel::where([['roles_id', '=', $getUsers[0]['role_id']]])->get()->toArray();
        $listAuth = [];

        foreach ($getAuth as $key => $value) {
          $tmpPageId = $value['page_id'];
          $tmpAuthrize = $value['status'];
          $tmpPageName = $this->getById($getPages, $tmpPageId);

          $listAuth[] = array(
            'id'        => $tmpPageId,
            'pagename'  => $tmpPageName['pagename'] ? $tmpPageName['pagename'] : '',
            'status'    => $tmpAuthrize
          );
        }

        $adminInfo = array(
          'id'          => Crypt::encryptString($getUsers[0]['id']),
          'name'        => $getUsers[0]['name'],
          'email'       => $getUsers[0]['email'],
          'picture'     => $getUsers[0]['avatar'],
          'phone'       => $getUsers[0]['phone'],
          'role'        => $getUsers[0]['role_id'],
          'role_name'   => $getRoles[0]['name'],
          'auth'        => $listAuth,
          'stamptime'   => $date->format('Y-m-d H:i:s')
        );

        Session::put('loginProfile', $adminInfo);

        return redirect('/cms/');
        exit;
      } else {
        return redirect('/login');
      }
      exit;
    }
    else {
      return redirect('/login');
      exit;
    }
    exit;
  }

  private function getById($array, $id) {
    foreach ($array as $item) {
        if ($item['id'] == $id) {
            return $item;
        }
    }
    return null; // Return null if the item with the specified ID is not found
  }

  /*
  public function resetPassword()
  {
    $date = new \DateTime("now", new \DateTimeZone("Asia/Bangkok"));
    $param = [];
    if(!empty($_POST)) {
        foreach ($_POST as $key => $value) {
            $param[$key] = $value;
        }
    }

    if(!empty($param) && !empty($param['forgotEmail'])) 
    {
      $getUsers = usersModel::where([['email', '=', $param['forgotEmail']], ['is_active', '=', 'Y'], ['is_delete', '=', 'N']])->get()->toArray();
      //print_r($getUsers); exit;
      if(count($getUsers) > 0) {
        $newPassword = substr(md5(uniqid(rand(), true)), 0, 8);

        $updateUser = usersModel::find($getUsers[0]['id']);
        $updateUser->token = base64_encode(md5($newPassword));
        $updateUser->save();

        $this->sendMail($param['forgotEmail'], $getUsers[0]['token'], $getUsers[0]['username']);
        return redirect('/login');
      }
      return redirect('/forgot-password');
    }
    return redirect('/forgot-password');
  }

  public function sendMail($email, $token, $username = "unknown")
  {
      // Load Composer's autoloader
      // require 'vendor/autoload.php';

      $mail = new PHPMailer(true); // Passing `true` enables exceptions

      try {
          $txtBody = '<p><strong>From</strong> Phumontra,</p><p>We hope this email finds you well</p><p>For security reasons, we request that you create a new password for your account. This process ensures that your personal information remains protected and secure.</p><p>Please follow the steps below to create a new password:</p>';
          $txtBody .= '<p>Click on the following link to access the password reset page: <a href="https://www.phumontraspa.co/new-password?token='.$token.'">Click</a></p><p>Follow the instructions to create a new password. Remember to choose a strong password that includes a combination of letters, numbers, and special characters.</p><p>If you did not request a password reset, please ignore this email. Your current password will remain unchanged, and no further action is required.</p><p>For any assistance, feel free to contact our support team at guChai@gmail.com .</p><p>Thank you for your attention to this important matter.</p><p><strong>Best regards,<strong></p><p><strong>Admin</strong></p>';

          // Server settings
          $mail->SMTPDebug = 0;                                       // Enable verbose debug output
          $mail->isSMTP();                                            // Set mailer to use SMTP
          $mail->Host       = env('MAIL_HOST');                       // Specify main and backup SMTP servers
          $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
          $mail->Username   = env('MAIL_USERNAME');                   // SMTP username
          $mail->Password   = env('MAIL_PASSWORD');                   // SMTP password
          $mail->SMTPSecure = env('MAIL_ENCRYPTION', 'tls');          // Enable TLS encryption, `ssl` also accepted
          $mail->Port       = env('MAIL_PORT', 587);                  // TCP port to connect to

          // Recipients
          $mail->setFrom('no-reply@phumontraspa.co', 'Phumontra Spa');
          $mail->addAddress($email);               // Add a recipient
          $mail->addAddress('f_chai@yahoo.co.th');   // Name is optional
          // $mail->addReplyTo('info@example.com', 'Information');
          // $mail->addCC('cc@example.com');
          // $mail->addBCC('bcc@example.com');

          // Attachments
          // $mail->addAttachment('/var/tmp/file.tar.gz');            // Add attachments
          // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');       // Optional name

          // Content
          $mail->isHTML(true);                                        // Set email format to HTML
          $mail->Subject = 'For reset your new password';
          $mail->Body    = $txtBody;
          // $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

          $mail->send();
          // echo response()->json(['message' => 'Message has been sent'], 200);
      } catch (Exception $e) {
          // echo response()->json(['message' => "Message could not be sent. Mailer Error: {$mail->ErrorInfo}"], 500);
      }
  }*/

}
