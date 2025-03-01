<div class="float-right">
    <nav aria-label="Page navigation example">
        <ul class="pagination">
            @if($pagination['total_page'] < 6) 
                @foreach($pagination['total_page'] as $page)
                    <li class="page-item"><a class="page-link" href="?page={{$page}}">{{$page}}</a></li>
                @endforeach
            @else 
                <li class="page-item">
                    <a class="page-link" href="?page=1" aria-label="Previous">
                        <span aria-hidden="true">&laquo;</span>
                    </a>
                </li>

                @if($pagination['page'] < 3)
                    <li class="page-item"><a class="page-link" href="?page=1">1</a></li>
                    <li class="page-item"><a class="page-link" href="?page=2">2</a></li>
                    <li class="page-item"><a class="page-link" href="?page=3">...</a></li>
                @elseif($pagination['page'] > ($pagination['total_page'] - 2))
                    <li class="page-item"><a class="page-link" href="?page={{($pagination['total_page']-2)}}">...</a></li>
                    <li class="page-item"><a class="page-link" href="?page={{($pagination['total_page']-1)}}">{{($pagination['total_page']-1)}}</a></li>
                    <li class="page-item"><a class="page-link" href="?page={{$pagination['total_page']}}">{{$pagination['total_page']}}</a></li>
                @else
                    <li class="page-item"><a class="page-link" href="?page={{$pagination['page']-2}}">...</a></li>
                    <li class="page-item"><a class="page-link" href="?page={{$pagination['page']-1}}">{{$pagination['page']-1}}</a></li>
                    <li class="page-item"><a class="page-link" href="?page={{$pagination['page']}}">{{$pagination['page']}}</a></li>
                    <li class="page-item"><a class="page-link" href="?page={{$pagination['page']+1}}">{{$pagination['page']+1}}</a></li>
                    <li class="page-item"><a class="page-link"  href="?page={{$pagination['page']+2}}">...</a></li>
                @endif
                
                <li class="page-item">
                    <a class="page-link" href="?page={{$pagination['total_page']}}" aria-label="Next">
                        <span aria-hidden="true">&raquo;</span>
                    </a>
                </li>
            @endif
        </ul>
    </nav>
</div>
