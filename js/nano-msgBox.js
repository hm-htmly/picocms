let Fh;

let msgOpen = function(title, content, buttons = null) {
	if(document.getElementById('msgWinOut') === null) {
		let width = parseInt(document.body.clientWidth/2);
		let height = parseInt(window.innerHeight/2);

		$('body').css('position:relative');

		$('body').insertFirst('<span id="msgWinOut"></span>');
		$('#msgWinOut').insertLast('<span id="msgWinIn"></span>');

		$('#msgWinIn').insertFirst('<span id="msgTitleBox"></span>');
		$('#msgTitleBox').insertFirst('<span id="msgTitle">'+title+'</span>');
		$('#msgTitleBox').insertLast('<button class="msgCloseBtn">&#10005;</button>');

		$('#msgWinIn').insertLast('<span id="msgContentBox"></span>');
		$('#msgContentBox').insertFirst('<span id="msgContent">'+content+'</span>');

		$('#msgWinIn').insertLast('<span id="msgFooterBox"></span>');
		if(buttons) {
			$('#msgFooterBox').insertFirst(buttons);
		} else {
			$('#msgFooterBox').insertFirst('<button id="ok">ok</button>');
		}

		//Elementposition
		let Fw = parseInt(width-document.getElementById('msgWinOut').clientWidth/2);
		Fh = parseInt(height-document.getElementById('msgWinOut').clientHeight/2);

		$('#msgWinOut').css('left:'+Fw+'px;top:'+Fh+'px;');

		$('.msgCloseBtn').on('click', function() {
			$('body').removeAttr('style');
			$('#msgWinOut').remove();
		});

		let verschieben = null;
		let elemX = 0;
		let elemY = 0;
		let mouseX = 0;
		let mouseY = 0;

		$('#msgTitleBox').on('mousedown', function(evt) {
			verschieben = $('#msgWinOut');
			
			let el = document.getElementById('msgWinOut');
			let offset = el.getBoundingClientRect();

			elemX = mouseX - offset.left;
			elemY = mouseY - offset.top;
		});
			
		$('#msgTitleBox').on('mousemove', function(evt) { 
			//Mausposition
			mouseY = document.all ? window.evt.clientY : evt.pageY;
			mouseX = document.all ? window.evt.clientX : evt.pageX;

			if(verschieben != null) {
				verschieben.css('left:'+(mouseX-elemX)+'px;top:'+(mouseY-elemY)+'px;');
			}
		});

		$('#msgTitleBox').on('mouseup', function() {
			verschieben = null;
		});

		$('#msgTitleBox').on('mouseout', function() {
			verschieben = null;
		});
	} else if(title != $('#msgTitle').text() || content != $('#msgContent').html() || buttons != $('#msgFooterBox').html()) {

		let oldHeight = document.getElementById('msgWinOut').clientHeight;

		$('#msgTitle').text(title);
		$('#msgContent').html(content);
		$('#msgFooterBox').html(buttons);

		let newHeight = document.getElementById('msgWinOut').clientHeight;
		let nTop = (oldHeight-newHeight)/2+eval(document.getElementById('msgWinOut').style.top.slice(0,-2));

		$('#msgWinOut').css('top:'+eval(nTop)+'px;');
	}
}
