$(document).ready(function($) {


	$('.confirm').click(function(){
		return confirm('Do You Want To Delete ?!');
	 });
	 
	 // to chang th i tag form + to - or form - to +
	 $(".toggel-info").click(function(){
	 
	 $(this).toggleClass('selected').parent().next(".card-body").fadeToggle(350);
	 if ($(this).hasClass('selected'))
	  {
		 $(this).html('<i class="fa fa-minus fa-lg"></i>');
	  }
	 else
	 {
		 $(this).html('<i class="fa fa-plus fa-lg"></i>');	
	 }
	 
	 });
	 
	 // Select 2
	 if($('.multiple').length > 0) {
		 $('.multiple').select2({
			 width: '100%',
			 multiple: true,
			 allowClear:true,
			 tags:true,
		 });
	 }
	 // for hide the alert massege after 5 seconds.
	 $(document).ready(function(){
		 $(".alert-success").fadeOut(5000);
	 });
 
 
	// Datetimepicker
	if($('.datetimepicker').length > 0) {
		$('.datetimepicker').datetimepicker({
			format: 'DD/MM/YYYY'
		});
	}

	
	// Variables declarations
	var $wrapper = $('.main-wrapper');
	var $pageWrapper = $('.page-wrapper');
	var $slimScrolls = $('.slimscroll');
	var $sidebarOverlay = $('.sidebar-overlay');
	
	// Sidebar
	var Sidemenu = function() {
		this.$menuItem = $('#sidebar-menu a');
	};

	function init() {
		var $this = Sidemenu;
		$('#sidebar-menu a').on('click', function(e) {
			if($(this).parent().hasClass('submenu')) {
				e.preventDefault();
			}
			if(!$(this).hasClass('subdrop')) {
				$('ul', $(this).parents('ul:first')).slideUp(350);
				$('a', $(this).parents('ul:first')).removeClass('subdrop');
				$(this).next('ul').slideDown(350);
				$(this).addClass('subdrop');
			} else if($(this).hasClass('subdrop')) {
				$(this).removeClass('subdrop');
				$(this).next('ul').slideUp(350);
			}
		});
		$('#sidebar-menu ul li.submenu a.active').parents('li:last').children('a:first').addClass('active').trigger('click');
	}
	// Sidebar Initiate
	init();
	
	// Sidebar overlay
	function sidebar_overlay($target) {
		if($target.length) {
			$target.toggleClass('opened');
			$sidebarOverlay.toggleClass('opened');
			$('html').toggleClass('menu-opened');
			$sidebarOverlay.attr('data-reff', '#' + $target[0].id);
		}
	}
	
	// Mobile menu sidebar overlay
	$(document).on('click', '#mobile_btn', function() {
		var $target = $($(this).attr('href'));
		sidebar_overlay($target);
		$wrapper.toggleClass('slide-nav');
		$('#chat_sidebar').removeClass('opened');
		return false;
	});
	
	// Chat sidebar overlay
	$(document).on('click', '#task_chat', function() {
		var $target = $($(this).attr('href'));
		console.log($target);
		sidebar_overlay($target);
		return false;
	});
	
	// Sidebar overlay reset
	$sidebarOverlay.on('click', function() {
		var $target = $($(this).attr('data-reff'));
		if($target.length) {
			$target.removeClass('opened');
			$('html').removeClass('menu-opened');
			$(this).removeClass('opened');
			$wrapper.removeClass('slide-nav');
		}
		return false;
	});
	
	
	
	// Floating Label
	if($('.floating').length > 0) {
		$('.floating').on('focus blur', function(e) {
			$(this).parents('.form-focus').toggleClass('focused', (e.type === 'focus' || this.value.length > 0));
		}).trigger('blur');
	}
	
	// Right Sidebar Scroll
	if($('#msg_list').length > 0) {
		$('#msg_list').slimscroll({
			height: '100%',
			color: '#878787',
			disableFadeOut: true,
			borderRadius: 0,
			size: '4px',
			alwaysVisible: false,
			touchScrollStep: 100
		});
		var msgHeight = $(window).height() - 124;
		$('#msg_list').height(msgHeight);
		$('.msg-sidebar .slimScrollDiv').height(msgHeight);
		$(window).resize(function() {
			var msgrHeight = $(window).height() - 124;
			$('#msg_list').height(msgrHeight);
			$('.msg-sidebar .slimScrollDiv').height(msgrHeight);
		});
	}
	
	// Left Sidebar Scroll
	if($slimScrolls.length > 0) {
		$slimScrolls.slimScroll({
			height: 'auto',
			width: '100%',
			position: 'right',
			size: '7px',
			color: '#ccc',
			wheelStep: 10,
			touchScrollStep: 100
		});
		var wHeight = $(window).height() - 60;
		$slimScrolls.height(wHeight);
		$('.sidebar .slimScrollDiv').height(wHeight);
		$(window).resize(function() {
			var rHeight = $(window).height() - 60;
			$slimScrolls.height(rHeight);
			$('.sidebar .slimScrollDiv').height(rHeight);
		});
	}
	
	// Page wrapper height
	var pHeight = $(window).height();
	$pageWrapper.css('min-height', pHeight);
	$(window).resize(function() {
		var prHeight = $(window).height();
		$pageWrapper.css('min-height', prHeight);
	});
	
	// Datetimepicker
	if($('.datetimepicker').length > 0) {
		$('.datetimepicker').datetimepicker({
			format: 'DD/MM/YYYY'
		});
	}
	
	// Datatable
	if($('.datatable').length > 0) {
		$('.datatable').DataTable({
			
			"lengthMenu":[[10,25,50,100,-1],[10,25,50,100,"All"]],
			"language":{
				"lengthMenu":"عرض _MENU_ سجلات",
				"zeroRecords":"لا توجد سجلات!",
				"infoEmpty":"لم يتم إيجاد شيء!",
				"info":"عرض  _START_ الى _END_ من أصل _TOTAL_ سجل",
				"infoFiltered":"(تمت التصفية من _MAX_ سجل)",
				"search":"<span>بحث</span> _INPUT_"
			}
			
		});
	}
	if($('.datatable_2').length > 0) {
		$('.datatable_2').DataTable({
			"lengthMenu":[[10,25,50,100,-1],[10,25,50,100,"All"]],
			"order":[[ 3 ,"desc"]],
			// "dom":'<"top"i>rt<"bottom"flp><"clear">',
			"language":{
				"lengthMenu":"Display _MENU_ Records",
				"zeroRecords":"No Record Available !",
				"infoEmpty":"Nothing Found - Sorry !",
				"infoFiltered":"(Filtered From _MAX_ Total Enteries)",
				"search":"<span>بحث</span> _INPUT_"
			}
			
		});
	}
	
	// Bootstrap Tooltip
	if($('[data-toggle="tooltip"]').length > 0) {
		$('[data-toggle="tooltip"]').tooltip();
	}
	
	// Mobile Menu
	$(document).on('click', '#open_msg_box', function() {
		$wrapper.toggleClass('open-msg-box');
		return false;
	});
	
	// Lightgallery
	if($('#lightgallery').length > 0) {
		$('#lightgallery').lightGallery({
			thumbnail: true,
			selector: 'a'
		});
	}
	
	// Incoming call popup
	if($('#incoming_call').length > 0) {
		$('#incoming_call').modal('show');
	}
	
	// Summernote
	if($('.summernote').length > 0) {
		$('.summernote').summernote({
			height: 200,
			minHeight: null,
			maxHeight: null,
			focus: false
		});
	}
	
	// Check all email
	$(document).on('click', '#check_all', function() {
		$('.checkmail').click();
		return false;
	});
	if($('.checkmail').length > 0) {
		$('.checkmail').each(function() {
			$(this).on('click', function() {
				if($(this).closest('tr').hasClass('checked')) {
					$(this).closest('tr').removeClass('checked');
				} else {
					$(this).closest('tr').addClass('checked');
				}
			});
		});
	}
	
	// Mail important
		$(document).on('click', '.mail-important', function() {
		$(this).find('i.fa').toggleClass('fa-star').toggleClass('fa-star-o');
	});
	
	// Dropfiles
	if($('#drop-zone').length > 0) {
		var dropZone = document.getElementById('drop-zone');
		var uploadForm = document.getElementById('js-upload-form');
		var startUpload = function(files) {
			console.log(files);
		};
		uploadForm.addEventListener('submit', function(e) {
			var uploadFiles = document.getElementById('js-upload-files').files;
			e.preventDefault();
			startUpload(uploadFiles);
		});
		dropZone.ondrop = function(e) {
			e.preventDefault();
			this.className = 'upload-drop-zone';
			startUpload(e.dataTransfer.files);
		};
		dropZone.ondragover = function() {
			this.className = 'upload-drop-zone drop';
			return false;
		};
		dropZone.ondragleave = function() {
			this.className = 'upload-drop-zone';
			return false;
		};
	}
	
	// Small Sidebar
	if(screen.width >= 992) {
		$(document).on('click', '#toggle_btn', function() {
			if($('body').hasClass('mini-sidebar')) {
				$('body').removeClass('mini-sidebar');
				$('.subdrop + ul').slideDown();
			} else {
				$('body').addClass('mini-sidebar');
				$('.subdrop + ul').slideUp();
			}
			return false;
		});
		$(document).on('mouseover', function(e) {
			e.stopPropagation();
			if($('body').hasClass('mini-sidebar') && $('#toggle_btn').is(':visible')) {
				var targ = $(e.target).closest('.sidebar').length;
				if(targ) {
					$('body').addClass('expand-menu');
					$('.subdrop + ul').slideDown();
				} else {
					$('body').removeClass('expand-menu');
					$('.subdrop + ul').slideUp();
				}
				return false;
			}
		});
	}

	$('tbody').delegate('.quantity,.price','keyup',function(){
        var tr=$(this).parent().parent();
        var quantity=tr.find('.quantity').val();
        var price=tr.find('.price').val();
        var amount=(quantity*price);
        tr.find('.amount').val(amount);
        total();
    });
    function total(){
        var total=0;
        $('.amount').each(function(i,e){
            var amount=$(this).val()-0;
        total +=amount;
    });
    $('.total').html(total+".00 SDG");    
    }
    $('.addRow').on('click',function(){
        addRow();
    });
    function addRow()
	{
		var tr='<tr>'+                    
		'<td><input type="text" name="item_name[]" class="form-control" required=""></td>'+  
		'<td><input type="text" name="quantity[]" class="form-control quantity" required=""></td>'+
		'<td><input type="text" name="price[]" class="form-control price"></td>'+
		'<td><input type="text" name="amount[]" class="form-control amount" disabled></td>'+
		'<td><a href="#" class="btn btn-danger remove"><i class="fa fa-trash"></i></a></td>'+
        '</tr>';
        $('tbody').append(tr);
    };
    $(document).on('click','.remove',function(){
        var last=$('tbody tr').length;
        if(last==1){
            alert("you can not remove last row");
        }
        else{
			 $(this).parent().parent().remove();
			 total();
        }
     
	});
	
	$(document).ready(function(){
		$("#payment_method_bank").change(function(){
			if($(this).val() == "bank"){
				$("#add_fields").show();
			}else{
				$("#add_fields").hide();
			}
		});
		$("#add_fields").hide();
	});


});
    