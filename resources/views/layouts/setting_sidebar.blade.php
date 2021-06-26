<div class="sidebar" id="sidebar">
    <div class="sidebar-inner slimscroll">
        <div class="sidebar-menu">
            <ul>
                <li>
                    <a href="{{route('home')}}"><i class="fa fa-dashboard"></i><span>{{ trans('sentence.Home')}}</span></a>
                </li>
                <li>
                    <a href="{{ route('Department.index') }}"><i class="fa fa-building"></i> <span>{{ trans('sentence.Departments List')}}</span></a>                
                </li> 
                <li>
                    <a href="{{ route('Jop.index') }}"><i class="fa fa-codepen"></i> <span>{{ trans('sentence.Jops List')}}</span></a>                
                </li>
                <li>
                    <a href="{{route('Test.index')}}"><i class="fa fa-flask"></i><span>{{ trans('sentence.Tests List')}}</span></a>
                </li>
            </ul>
        </div>
    </div>
</div>