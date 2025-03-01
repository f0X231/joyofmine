<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>{{$seo['title']}}</title>
<meta name="robots" content="index, follow">
<link rel="shortcut icon" href="/favicon.ico">

<!-- Meta tags SEO -->
<meta name="description" content="{{$seo['descriptions']}}" /> <!-- Maximum 300 characters -->
<meta name="keywords" content="{{$seo['keywords']}}" />

<!-- Open Graph data -->
<meta property="og:url" content="{{$seo['uri']}}" />
<meta property="og:type" content="{{$seo['type']}}" />
<meta property="og:title" content="{{$seo['title']}}" />
<meta property="og:description" content="{{$seo['descriptions']}}" />
<meta property="og:image" content="{{$seo['images']}}" />

<!-- Twitter Card data -->
<meta name="twitter:title" content="{{$seo['title']}}">
<meta name="twitter:description" content="{{$seo['descriptions']}}">
<meta name="twitter:creator" content="@f0X231">
<meta name="twitter:image" content="{{$seo['images']}}">

<!-- Bootstrap CSS -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" />
<link rel="stylesheet" type="text/css" href="{{ asset('/css/fonts.css?ver=101') }}" />
<link rel="stylesheet" type="text/css" href="{{ asset('/css/jomMainStyle.css?ver=101') }}" />
<link rel="stylesheet" type="text/css" href="{{ asset('/css/glowCookies.css?ver=101') }}" />

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>

<!-- Google Tag Manager -->
<script>
        (function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src='https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);})(window,document,'script','dataLayer','GTM-5PX36KKB');
</script>
<!-- End Google Tag Manager -->
<!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-D3J2E51CY4"></script>
<script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());
        gtag('config', 'G-D3J2E51CY4');
</script>

<!-- Cookie Consent -->
<script src="/js/glowCookies.js"></script>
<script>
    glowCookies.start('en', { 
        style: 2,
        analytics: 'UA-140231010-6', 
        facebookPixel: '177588884087489',
        hideAfterClick: true,
        border: 'none',
        position: 'left',
        policyLink: 'https://www.joyofminds.com/privacy-policy',
        customScript: [{ type: 'custom', position: 'body', content: `console.log('my custom js');` }],
        bannerDescription: 'เราใช้คุกกี้เพื่อเพิ่มประสิทธิภาพ และประสบการณ์ที่ดีในการใช้งานเว็บไซต์ คุณสามารถเลือกตั้งค่าความยินยอมการใช้คุกกี้ได้ ',
        bannerLinkText: 'นโยบายความเป็นส่วนตัว',
        //bannerBackground: '#fff',
        //bannerColor: '#fafafa',
        bannerHeading: '<h2>Cookies</h2>',
        acceptBtnText: 'ยอมรับ',
        //acceptBtnColor: 'green',
        //acceptBtnBackground: 'red',
        rejectBtnText: 'ไม่ยอมรับ',
        //rejectBtnBackground: 'lightblue',
        //rejectBtnColor: 'blue',
        //manageColor: 'white',
        //manageBackground: 'blue',
        manageText: 'cookies text'
    });
</script>