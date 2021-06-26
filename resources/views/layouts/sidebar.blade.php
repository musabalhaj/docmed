@if (Auth()->user()->role == 1)   {{-- System Admin Sidebar --}}
<div class="sidebar" id="sidebar">
  <div class="sidebar-inner slimscroll">
      <div id="sidebar-menu" class="sidebar-menu">
        <ul>
          {{--  class="{{Request::is('home') ? 'active' : ''}}"  --}}
            <li>
                <a href="{{ route('home') }}"><i class="fa fa-dashboard"></i> <span>{{ trans('sentence.Dashboard')}}</span></a>
            </li>
            <li class="submenu">
                  <a href="#"><i class="fa fa-user-md"></i> <span>{{ trans('sentence.Doctors')}}</span> <span class="menu-arrow"></span></a>
                  <ul style="display: none;">
                    <li><a href="{{route('Doctor.index')}}">{{ trans('sentence.Doctors List')}}</a></li>
                    <li><a href="{{route('Doctor.create')}}">{{ trans('sentence.Add Doctor')}}</a></li>
                  </ul>
            </li>
            <li class="submenu">
                  <a href="#"><i class="fa fa-users"></i> <span>{{ trans('sentence.Human Resources')}} </span> <span class="menu-arrow"></span></a>
                  <ul style="display: none;">
                    <li><a href="{{route('Employee.index')}}">{{ trans('sentence.Employees List')}}</a></li>
                    <li><a href="{{route('Accounting.index')}}">{{ trans('sentence.Accountant List')}}</a></li>
                    <li><a href="{{route('Pharmacy.index')}}">{{ trans('sentence.Pharmacist List')}}</a></li>
                    <li><a href="{{route('Laboratory.index')}}">{{ trans('sentence.Laborotarist List')}}</a></li>
                    <li><a href="{{route('Reception.index')}}">{{ trans('sentence.Receptionist List')}}</a></li>
                  </ul>
            </li>
            <li class="submenu">
                <a href="#"><i class="fa fa-server"></i> <span>{{ trans('sentence.Services')}}</span> <span class="menu-arrow"></span></a>
                <ul style="display: none;">
                  <li><a href="{{route('Service.index')}}">{{ trans('sentence.Services List')}}</a></li>
                  <li><a href="{{route('Service.create')}}">{{ trans('sentence.Add Service')}}</a></li>
                </ul>
            </li>
            {{--  <li class="submenu">
                  <a href="#"><i class="fa fa-university"></i> <span>{{ trans('sentence.Banks')}}  </span> <span class="menu-arrow"></span></a>
                  <ul style="display: none;">
                    <li><a href="{{ route('Bank.index') }}">{{ trans('sentence.Banks List')}}</a></li>
                    <li><a href="{{ route('Branch.index') }}">{{ trans('sentence.Branchs List')}}</a></li>
                    <li><a href="{{ route('Account.index') }}">{{ trans('sentence.Accounts List')}}</a></li>
                  </ul>
            </li>  --}}
            {{--  <li class="submenu">
                <a href="#"><i class="fa fa-sitemap"></i> <span>{{ trans('sentence.Inventory')}}  </span> <span class="menu-arrow"></span></a>
                <ul style="display: none;">
                  <li><a href="{{ route('Category.index') }}">{{ trans('sentence.Categories List')}}</a></li>
                  <li><a href="{{ route('Item.index') }}">{{ trans('sentence.Items List')}}</a></li>
                  <li><a href="{{ route('Item.create') }}">{{ trans('sentence.Add Item')}}</a></li>
                </ul>
            </li>  --}}
            <li>
                <a href="{{ route('Appointment.index') }}"><i class="fa fa-calendar"></i> <span>{{ trans('sentence.Appointments')}}</span></a>
            </li>
            <li>
                <a href="{{ route('Schedule.index') }}"><i class="fa fa-calendar-check-o"></i> <span>{{ trans('sentence.Doctors Schedule')}}</span></a>
            </li>
            <li class="submenu">
              <a href="#"><i class="fa fa-book"></i> <span>{{ trans('sentence.Financial Accounts')}} </span> <span class="menu-arrow"></span></a>
              <ul style="display: none;">
                <li><a href="{{ route('Cat.index') }}">{{ trans('sentence.Cats')}}</a></li>
                <li><a href="{{ route('Income.index') }}">{{ trans('sentence.Income')}}</a></li>
                <li><a href="{{ route('Expense.index') }}">{{ trans('sentence.Expenses')}}</a></li>
                <li><a href="{{ route('Bill.index') }}">{{ trans('sentence.Bills')}}</a></li>
                <li><a href="{{ route('Supplier.index') }}">{{ trans('sentence.Suppliers')}}</a></li>
                <li><a href="{{ route('Salary.index')}}">{{ trans('sentence.Employee Salary')}}</a></li>
              </ul>
            </li>

            <li class="submenu">
              <a href="#"><i class="fa fa-flag-o"></i> <span>{{ trans('sentence.Reports')}}</span> <span class="menu-arrow"></span></a>
              <ul style="display: none;">
                <li><a href="{{ route('ExpenseReport') }}">{{ trans('sentence.Expenses Report')}}</a></li>
                <li><a href="{{ route('IncomeReport') }}">{{ trans('sentence.Income Report')}}</a></li>
                <li><a href="{{ route('IncomeExpenseReport') }}">{{ trans('sentence.Profit Report')}}</a></li>
                <li><a href="{{ route('AppointmentReport') }}">{{ trans('sentence.Appointments Report')}}</a></li>
                <li><a href="{{ route('PatientReport') }}">{{ trans('sentence.Patients Report')}}</a></li>
                <li><a href="{{ route('PatientTestReport') }}">{{ trans('sentence.Patients Tests Report')}}</a></li>
                <li><a href="{{ route('UserReport') }}">{{ trans('sentence.Users Report')}}</a></li>
              </ul>
            </li>
            <li>
                <a href="{{ route('setting') }}"><i class="fa fa-cog"></i> <span>{{ trans('sentence.Settings')}}</span></a>
            </li>
        </ul>
      </div>
  </div>
</div>
@elseif(Auth()->user()->role== 2)  {{--Doctor Sidebar--}}
<div class="sidebar" id="sidebar">
    <div class="sidebar-inner slimscroll">
        <div id="sidebar-menu" class="sidebar-menu">
            <ul>
                <li>
                  <a href="{{ route('home') }}"><i class="fa fa-dashboard"></i> <span>{{ trans('sentence.Dashboard')}}</span></a>
                </li>
                <li>
                  <a href="{{ route('PatientReport') }}"><i class="fa fa-flag-o"></i><span>{{ trans('sentence.Patients Report')}}</span></a>
                </li>
            </ul>
        </div>
    </div>
</div>
@elseif(Auth()->user()->role== 3)  {{--laboratorist Sidebar--}}
<div class="sidebar" id="sidebar">
    <div class="sidebar-inner slimscroll">
        <div id="sidebar-menu" class="sidebar-menu">
            <ul>
                <li>
                  <a href="{{ route('home') }}"><i class="fa fa-dashboard"></i> <span>{{ trans('sentence.Dashboard')}}</span></a>
                </li>
                <li>
                  <a href="{{route('Test.index')}}"><i class="fa fa-flask"></i><span>{{ trans('sentence.Tests')}}</span></a>
                </li>
                <li class="submenu">
                  <a href="#"><i class="fa fa-flag-o"></i> <span>{{ trans('sentence.Reports')}}</span> <span class="menu-arrow"></span></a>
                  <ul style="display: none;">
                    <li><a href="{{ route('PatientTestReport') }}">{{ trans('sentence.Patients Tests Report')}}</a></li>
                  </ul>
                </li>
            </ul>
        </div>
    </div>
</div>
@elseif(Auth()->user()->role== 5)  {{--Accountant Sidebar--}}
<div class="sidebar" id="sidebar">
  <div class="sidebar-inner slimscroll">
      <div id="sidebar-menu" class="sidebar-menu">
          <ul>
              <li >
                <a href="{{ route('home') }}"><i class="fa fa-dashboard"></i> <span>{{ trans('sentence.Dashboard')}}</span></a>
              </li>
              <li>
                <a href="{{ route('Cat.index') }}"><i class="fa fa-list"></i> <span>{{ trans('sentence.Cats')}}</span></a>
              </li>
              <li>
                <a href="{{ route('Income.index') }}"><i class="fa fa-credit-card"></i> <span>{{ trans('sentence.Income')}}</span></a>
              </li>
              <li>
                <a href="{{ route('Customer.index') }}"><i class="fa fa-dashboard"></i> <span>{{ trans('sentence.Customer')}}</span></a>
              </li>
              <li>
                <a href="{{ route('Bill.index') }}"><i class="fa fa-files-o"></i> <span>{{ trans('sentence.Purchase Bill')}}</span></a>
              </li>
              <li>
                <a href="{{ route('Expense.index') }}"><i class="fa fa-shopping-cart"></i> <span>{{ trans('sentence.Expenses')}}</span></a>
              </li>
              <li>
                <a href="{{ route('Supplier.index') }}"><i class="fa fa-medkit"></i> <span>{{ trans('sentence.Suppliers')}}</span></a>
              </li>
              <li>
                <a href="{{ route('Salary.index')}}"><i class="fa fa-money"></i> <span>{{ trans('sentence.Employee Salary')}}</span></a>
              </li>
              <li class="submenu">
                <a href="#"><i class="fa fa-flag-o"></i> <span>{{ trans('sentence.Reports')}}</span> <span class="menu-arrow"></span></a>
                <ul style="display: none;">
                  <li><a href="{{ route('ExpenseReport') }}">{{ trans('sentence.Expenses Report')}}</a></li>
                  <li><a href="{{ route('IncomeReport') }}">{{ trans('sentence.Income Report')}}</a></li>
                  <li><a href="{{ route('IncomeExpenseReport') }}">{{ trans('sentence.Profit Report')}}</a></li>
                </ul>
              </li>
          </ul>
      </div>
  </div>
</div>
@elseif(Auth()->user()->role== 6)  {{--Receptionist Sidebar--}}
<div class="sidebar" id="sidebar">
    <div class="sidebar-inner slimscroll">
        <div id="sidebar-menu" class="sidebar-menu">
            <ul>
                <li>
                  <a href="{{ route('home') }}"><i class="fa fa-dashboard"></i> <span>{{ trans('sentence.Dashboard')}}</span></a>
                </li>
                <li>
                    <a href="{{ route('Appointment.index') }}"><i class="fa fa-calendar"></i> <span>{{ trans('sentence.Appointments')}}</span></a>
                </li>
                <li>
                    <a href="{{ route('Schedule.index') }}"><i class="fa fa-calendar-check-o"></i> <span>{{ trans('sentence.Doctor Schedule')}}</span></a>
                </li>
                <li class="submenu">
                  <a href="#"><i class="fa fa-book"></i> <span>{{ trans('sentence.Booking')}}</span> <span class="menu-arrow"></span></a>
                  <ul style="display: none;">
                    <li><a href="{{route('Appointment.create')}}">{{ trans('sentence.Appointment With Doctor')}}</a></li>
                    <li><a href="{{route('createService')}}">{{ trans('sentence.Book For Service')}}</a></li>
                  </ul>
                </li>
                <li>
                  <a href="#"><i class="fa fa-server"></i> <span>{{ trans('sentence.Services')}}</span> <span class="menu-arrow"></span></a>
                  <ul style="display: none;">
                    <li><a href="{{route('Service.index')}}">{{ trans('sentence.Services List')}}</a></li>
                    <li><a href="{{route('Service.create')}}">{{ trans('sentence.Add Service')}}</a></li>
                  </ul>
                </li>
                <li class="submenu">
                  <a href="#"><i class="fa fa-flag-o"></i> <span>{{ trans('sentence.Reports')}}</span> <span class="menu-arrow"></span></a>
                  <ul style="display: none;">
                    <li><a href="{{ route('AppointmentReport') }}">{{ trans('sentence.Appointments Report')}}</a></li>
                    <li><a href="{{ route('PatientReport') }}">{{ trans('sentence.Patients Report')}}</a></li>
                  </ul>
                </li>
            </ul>
        </div>
    </div>
</div>
@endif