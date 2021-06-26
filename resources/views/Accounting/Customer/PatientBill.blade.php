<!DOCTYPE html>
@if (str_replace('_', '-', app()->getLocale()) == 'en')
<html dir="ltr">
@elseif (str_replace('_', '-', app()->getLocale()) == 'ar')
<html dir="rtl">
@endif
<head>
	<title>{{trans('sentence.Abdel Moneim Medical Center')}}</title>
	<link href='https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,300,700&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
	<!-- <link rel="stylesheet" href="sass/main.css" media="screen" charset="utf-8"/> -->
	<meta content="width=device-width, initial-scale=1.0" name="viewport">
	<meta http-equiv="content-type" content="text-html; charset=utf-8">
	@if (str_replace('_', '-', app()->getLocale()) == 'en')
	<link href="{{ asset('css/bill.css') }}" rel="stylesheet">
	@elseif (str_replace('_', '-', app()->getLocale()) == 'ar')
	<link href="{{ asset('css/bill_rtl.css') }}" rel="stylesheet">
	@endif
</head>

<body>
	<header class="clearfix">
		<div class="container">
			<figure>
				<img class="logo" src="data:image/svg+xml;charset=utf-8;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iVVRGLTgiIHN0YW5kYWxvbmU9Im5vIj8+Cjxzdmcgd2lkdGg9IjQxcHgiIGhlaWdodD0iNDFweCIgdmlld0JveD0iMCAwIDQxIDQxIiB2ZXJzaW9uPSIxLjEiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgeG1sbnM6eGxpbms9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkveGxpbmsiIHhtbG5zOnNrZXRjaD0iaHR0cDovL3d3dy5ib2hlbWlhbmNvZGluZy5jb20vc2tldGNoL25zIj4KICAgIDwhLS0gR2VuZXJhdG9yOiBTa2V0Y2ggMy40LjEgKDE1NjgxKSAtIGh0dHA6Ly93d3cuYm9oZW1pYW5jb2RpbmcuY29tL3NrZXRjaCAtLT4KICAgIDx0aXRsZT5MT0dPPC90aXRsZT4KICAgIDxkZXNjPkNyZWF0ZWQgd2l0aCBTa2V0Y2guPC9kZXNjPgogICAgPGRlZnM+PC9kZWZzPgogICAgPGcgaWQ9IlBhZ2UtMSIgc3Ryb2tlPSJub25lIiBzdHJva2Utd2lkdGg9IjEiIGZpbGw9Im5vbmUiIGZpbGwtcnVsZT0iZXZlbm9kZCIgc2tldGNoOnR5cGU9Ik1TUGFnZSI+CiAgICAgICAgPGcgaWQ9IklOVk9JQ0UtMiIgc2tldGNoOnR5cGU9Ik1TQXJ0Ym9hcmRHcm91cCIgdHJhbnNmb3JtPSJ0cmFuc2xhdGUoLTMwLjAwMDAwMCwgLTMwLjAwMDAwMCkiIGZpbGw9IiMyQThFQUMiPgogICAgICAgICAgICA8ZyBpZD0iWkFHTEFWTEpFIiBza2V0Y2g6dHlwZT0iTVNMYXllckdyb3VwIiB0cmFuc2Zvcm09InRyYW5zbGF0ZSgzMC4wMDAwMDAsIDE1LjAwMDAwMCkiPgogICAgICAgICAgICAgICAgPGcgaWQ9IkxPR08iIHRyYW5zZm9ybT0idHJhbnNsYXRlKDAuMDAwMDAwLCAxNS4wMDAwMDApIiBza2V0Y2g6dHlwZT0iTVNTaGFwZUdyb3VwIj4KICAgICAgICAgICAgICAgICAgICA8cGF0aCBkPSJNMzkuOTI0NjM2MywxOC40NDg2MjEgTDMzLjc3MDczNTgsMTEuODQyMjkyMyBMMzMuNzcwNzM1OCw0LjIxMDUyNjgxIEMzMy43NzA3MzU4LDIuODMwOTIyMzYgMzIuNzI5MzQxMSwxLjcxMjU0NDE0IDMxLjQ0MTczNzIsMS43MTI1NDQxNCBDMzAuMTU3NDExOSwxLjcxMjU0NDE0IDI5LjExNjAxNzMsMi44MzA5MjIzNiAyOS4xMTYwMTczLDQuMjEwNTI2ODEgTDI5LjExNjAxNzMsNi44NDUxMTcwNCBMMjQuNTMzNzM3NCwxLjkyNjAzNDcxIEMyMi4yNjgwNTg1LC0wLjUwNDQxNDA5NCAxOC4zMjkwMTcxLC0wLjUwMDEyNDQ4NCAxNi4wNjg4NzEsMS45MzAzMjQzMiBMMC42ODExNDgzMjksMTguNDQ4NjIxIEMtMC4yMjY5NDY5ODQsMTkuNDI1NjYyMSAtMC4yMjY5NDY5ODQsMjEuMDA2NzY4MiAwLjY4MTE0ODMyOSwyMS45ODIwNDk0IEMxLjU5MDE2NTc3LDIyLjk1OTA5MDUgMy4wNjU3ODIyMywyMi45NTkwOTA1IDMuOTczODc3NTUsMjEuOTgyMDQ5NCBMMTkuMzU5OTYwOSw1LjQ2Mzc1Mjc1IEMxOS44NjE0OTg0LDQuOTI4NDMxNDcgMjAuNzQ0Nzk4Niw0LjkyODQzMTQ3IDIxLjI0MzQ2NzIsNS40NjIxMDI5IEwzNi42MzE5MDcxLDIxLjk4MjA0OTQgQzM3LjA4ODU2NzUsMjIuNDcwNTE1IDM3LjY4MzM0MjgsMjIuNzEzNzAyOSAzOC4yNzgxMTgsMjIuNzEzNzAyOSBDMzguODc0MDIwNCwyMi43MTM3MDI5IDM5LjQ3MDAyNTIsMjIuNDcwNTE1IDM5LjkyNTA0NjIsMjEuOTgyMDQ5NCBDNDAuODMzNTUxMywyMS4wMDY3NjgyIDQwLjgzMzU1MTMsMTkuNDI1NjYyMSAzOS45MjQ2MzYzLDE4LjQ0ODYyMSBMMzkuOTI0NjM2MywxOC40NDg2MjEgWiIgaWQ9IkZpbGwtMSI+PC9wYXRoPgogICAgICAgICAgICAgICAgICAgIDxwYXRoIGQ9Ik0yMS4xMTEzOTc0LDEwLjIwNTg2MTIgQzIwLjY2NDM2ODIsOS43MjYzMDQ4MiAxOS45NDA2OTkzLDkuNzI2MzA0ODIgMTkuNDk0ODk5NiwxMC4yMDU4NjEyIEw1Ljk1OTg0Mjk2LDI0LjczMTM1OTIgQzUuNzQ2MTEzMiwyNC45NjAzNTg0IDUuNjI1MjExNDIsMjUuMjczNjA5OSA1LjYyNTIxMTQyLDI1LjYwMDA2MDIgTDUuNjI1MjExNDIsMzYuMTk0ODQ2IEM1LjYyNTIxMTQyLDM4LjY4MDcyOTcgNy41MDI3NzUwNyw0MC42OTYxODYzIDkuODE4NDUzOTgsNDAuNjk2MTg2MyBMMTYuNTE5NDg2Myw0MC42OTYxODYzIEwxNi41MTk0ODYzLDI5LjU1NTQxMDIgTDI0LjA4NTA2ODgsMjkuNTU1NDEwMiBMMjQuMDg1MDY4OCw0MC42OTYxODYzIEwzMC43ODY2MTM1LDQwLjY5NjE4NjMgQzMzLjEwMjI5MjQsNDAuNjk2MTg2MyAzNC45Nzk3NTM2LDM4LjY4MDcyOTcgMzQuOTc5NzUzNiwzNi4xOTQ4NDYgTDM0Ljk3OTc1MzYsMjUuNjAwMDYwMiBDMzQuOTc5NzUzNiwyNS4yNzM2MDk5IDM0Ljg1OTY3MTUsMjQuOTYwMzU4NCAzNC42NDUyMjQ1LDI0LjczMTM1OTIgTDIxLjExMTM5NzQsMTAuMjA1ODYxMiBaIiBpZD0iRmlsbC0zIj48L3BhdGg+CiAgICAgICAgICAgICAgICA8L2c+CiAgICAgICAgICAgIDwvZz4KICAgICAgICA8L2c+CiAgICA8L2c+Cjwvc3ZnPg==" alt="">
			</figure>
			<div class="company-info">
				<h2 class="title">{{trans('sentence.Abdel Moneim Medical Center')}}</h2>
				<span>Sudan , Omdorman-Ombada, 18-Str</span>
				<span class="line"></span>
				<a class="phone" href="tel:+249-1176-82813">+249-1176-82813</a>
				<span class="line"></span>
				<a class="email" href="mailto:abdelmoniem@gmail.com">abdelmoniem@gmail.com</a>
			</div>
		</div>
	</header>

	<section>
		<div class="details clearfix">
			<div class="client left">
				<p class="name">{{$Appointment->name}}</p>
				<p>
					{{$Appointment->address}},<br>
				</p>
				<a href="mailto:{{$Appointment->email}}">{{$Appointment->email}}</a>
			</div>
			<div class="data right">
				<div class="title">{{trans('sentence.Invoice')}} -00{{$Appointment->id}}</div>
				<div class="date">
					{{trans('sentence.Date')}}: {{$Appointment->date}}<br>
				</div>
			</div>
		</div>
		<div class="container">
			<div class="table-wrapper">
				<table>

					@if (!empty($ServiceInfo))
						<tbody class="head">
							<tr>
								<th class="no"></th>
								<th class="desc"><div>{{trans('sentence.Services')}}</div></th>
								<th class="qty"><div>{{trans('sentence.Price')}}</div></th>
							</tr>
						</tbody>
						<tbody class="body">
								@php
									$doctor_price = DB::table('users')->where('id',$Appointment->doctor_id)->get()->first()
								@endphp
							@if (!empty($doctor_price))
								<td>0</td>
								<td class="desc">{{trans('sentence.Appointment')}}</td>
								<td class="total">
									${{$doctor_price->doctor_price}}
								</td>
							@endif
							@foreach ($ServiceInfo as $v=>$info)
							<tr>
								<td class="no">{{$v+1}}</td>
								<td class="desc">
									@foreach ($Service as $service)    
									@if ($info->service_id == $service->id)
										
									{{$service->name}}
									@endif
									@endforeach
								</td>
								<td class="total">
									@foreach ($Service as $service)    
									@if ($info->service_id == $service->id)
										
									${{$service->price}}
									@endif
									@endforeach
								</td>
							</tr>
							@endforeach
						</tbody>
					@endif
					
					@if (!empty($TestInfo))
						<tbody class="head">
							<tr>
								<th class="no"></th>
								<th class="desc"><div>{{trans('sentence.Tests')}}</div></th>
								<th class="qty"><div>{{trans('sentence.Price')}}</div></th>
							</tr>
						</tbody>
						<tbody class="body">
							@foreach ($TestInfo as $v=>$info)
							<tr>
								<td class="no">{{$v+1}}</td>
								<td class="desc">
									@foreach ($Tests as $test)    
									@if ($info->test_id == $test->id)
										
									{{$test->name}}
									@endif
									@endforeach
								</td>
								<td class="total">
									@foreach ($Tests as $test)    
									@if ($info->test_id == $test->id)
										
									${{$test->price}}
									@endif
									@endforeach
								</td>
							</tr>
							@endforeach
						</tbody>
					@endif
					
				</table>
			</div>
			<div class="no-break">
				<table class="grand-total">
					<tbody>
						<tr>
                            @php 
                            $total = DB::table('service_infos')->where('appointment_id',$Appointment->id)->get()->sum('price');
                            $total2 = DB::table('test_infos')->where('appointment_id',$Appointment->id)->get()->sum('price');
                            @endphp
							<td class="grand-total" colspan="5"><div><span>{{trans('sentence.Total')}}:
								@if (!empty($doctor_price))
									</span>${{$total+$total2+$doctor_price->doctor_price}}</div></td>
								@else 
									</span>${{$total+$total2}}</div></td>
								@endif 
						</tr>
					</tbody>
				</table>
			</div>
		</div>
	</section>

	<footer>
		<div class="container">
			{{--  <div class="thanks">Thank you!</div>  --}}
			<div class="notice">
				<div>{{trans('sentence.Note')}}:</div>
				<div>
                    {{trans('sentence.Not Available')}}
                </div>
			</div>
			<div class="end">{{trans('sentence.Invoice was created on a computer and is valid without the signature and seal.')}}</div>
		</div>
	</footer>

</body>

</html>