(function() {
	/**
	 * factory function
	 */

	function factory(key) {
		if (key == "topBarLoc") {
			return new topBarLoc();
		} else if (key == "modal") {
			return new modal();
		} else if (key == "topRight") {
			return new topRight();
		} else if (key == "account") {
			return new account();
		} else if (key == "searchBtn") {
			return new searchBtn();
		} else if (key == "heroSlider") {
			return new heroSlider();
		} else if (key == "info") {
			return new info();
		} else if (key == "categery") {
			return new categery();
		} else if (key == "recommend") {
			return new recommend();
		} else if (key == "homeCate") {
			return new homeCate();
		} else if (key == "formVerify") {
			return new formVerify();
		} else if (key == "pay") {
			return new pay();
		} else if (key == "detail") {
			return new detail();
		}
	}

	// location
	var loc_btn = $(".location");
	var loc_menu = $(".location-menu");
	var loc_menu_span = loc_menu.children();
	// login modal
	var login_btn = $(".login-btn");
	var close_modal  = $(".close-btn");
	var login_backdrop = $(".login-backdrop");
	var login_modal = $(".login-modal");
	var login_inp = $(".login-form input.inp");
	// top-right
	var liArr = $(".top-right-item");
	var cartLiArr = $(".cart input:checked").parent().parent();
	var ckboxArr = $(".cart .checkbox");
	var accInp = $(".info-content .base-info input:not([disabled]),.address input:not([disabled])");
	// search type
	var search_btn = $(".search-type");
	var typeListArr = $(".type-list").children();
	// service list
	var servArr = $(".service-list a");
	// categery list
	var cateLiArr = $(".categery .categery-item");
	var cateAArr = $(".categery .categery-item .categery-item-link");
	var subMenuArr = $(".sub-menu");
	// recommend list
	var recoListArr = $(".recommend-title");
	var wrapArr = $(".wrapper");
	var rec_ctrl = $(".reco-control a");
	// home-page
	var homeLiArr = $(".home-cate li");
	var homeCateBg = $(".home-cate-bg");
	// form verify
	var inpArr = $(".regist-wrap input.inp");
	var nextArr = $(".regist-wrap .next");
	var logInpArr = $(".login-wrap input.inp");
	// pay page
	var trArr = $(".pay-con tbody tr");

	/**
		* alert function
		*/

		function infoTip(string) {
			$("<span class='alert'>提示："+ string +"</span>").prependTo($("body"));
			$(".alert").fadeIn(300);
			var hide = setTimeout(function() {
				$("body .alert").fadeOut(1000);
			}, 1500);
			var hide = setTimeout(function() {
				$("body .alert").remove();
			}, 1500);
		}

	/**
	 * location object
	 */

	function topBarLoc() {}

	/**
	 * show location menu
	 */

	topBarLoc.prototype.showLoc = function() {
		loc_menu.slideDown(300);
	}

	/**
	 * hide location menu
	 */

	topBarLoc.prototype.hideLoc = function() {
		loc_menu.fadeOut(300);
	}

	topBarLoc.prototype.locMenuArray = [];

	/**
	 * mouse function for topBarLoc
	 */

	topBarLoc.prototype.mouse = function() {
		var locMenuArray = topBarLoc.prototype.locMenuArray;
		loc_btn.click(function() {
			locMenuArray.forEach(function(one) {
				clearTimeout(one);
			});
			locMenuArray.length = 0;
			var timer = setTimeout(topBarLoc.prototype.showLoc, 0);
			locMenuArray.push(timer);
		});
		loc_btn.mouseleave(function() {
			locMenuArray.forEach(function(one) {
				clearTimeout(one);
			});
			locMenuArray.length = 0;
			var timer = setTimeout(topBarLoc.prototype.hideLoc, 0);
			locMenuArray.push(timer);
		});
		$.each(loc_menu_span, function(index) {
			$(loc_menu_span[index]).click(function() {
				var text = $(this).text();
				$(".loc-addr").replaceWith("<span class='loc-addr'>" + text + "</span>");
			});
		});

	}

	var topbarLoc = factory("topBarLoc");
	topbarLoc.mouse();

	/**
	 * login modal object
	 */

	 function modal() {}

	 modal.prototype.verifyLogin = function(index) {
	 	if ($(login_inp[index]).val() != "") {
	 		return true;
	 	} else {
	 		$(login_inp[index]).addClass("error-inp");
	 		$(login_inp[index]).siblings().show(100);
	 		return false;
	 	}
	 }

	 modal.prototype.mouse = function() {
	 	/**
	 	 * show and hide modal
	 	 */
	 	$(login_btn).click(function() {
	 		$(login_backdrop).addClass("active-modal");
	 		$(login_modal).show(300);
	 	});
	 	$(close_modal).click(function() {
	 		$(login_backdrop).removeClass("active-modal");
	 		$(login_modal).hide(300);
	 	});
	 	/**
	 	 * show and hide font-icon in span
	 	 */
	 	$.each(login_inp, function(index) {
	 		$(login_inp[index]).click(function() {
	 			$(this).removeClass("error-inp");
	 			$(this).addClass("active-inp");
	 			$(this).siblings().hide(100);
	 		});
	 		$(login_inp[index]).blur(function() {
	 			$(this).removeClass("active-inp");
	 			modal.prototype.verifyLogin(index);
	 		});
	 	});
	 	/**
	 	 * login
	 	 */
	 	$(".login-form").children().last().click(function() {
	 		if(modal.prototype.verifyLogin(0) && modal.prototype.verifyLogin(1)) {
				var telText = $(login_inp[0]).val();
				var pwdText = $(login_inp[1]).val();
				$.ajax({
					method: 'POST',
					url: './login.php',
					data: {
						tel: telText,
						pwd: pwdText
					},
					async: false,
					contentType: 'application/x-www-form-urlencoded; charset=UTF-8',
					dataType: 'text',
					success: function(data) {
						if (data === "手机号或密码不正确！") {
							infoTip(data);
							return false;
						} else if (data === "用户名和密码不存在！") {
							infoTip(data);
							return false;
						} else if (data === "ok,欢迎回来~"){
							window.location.href="index.php";
							infoTip(data);
						}
					}
				});
	 		} else {
	 			return false;
	 		}
	 	});
	 }

	 var Modal = factory("modal");
	 Modal.mouse();

	/**
	 * top-right object
	 */

	function topRight() {}

	/**
	 * show list
	 */

	topRight.prototype.showList = function(index) {
		$(liArr[index]).children().last().fadeIn(100);
		$(liArr[index]).children().first().css({"color": "#1c9e79","background-color": "#fff"});
	}

	/**
	 * hide list
	 */

	topRight.prototype.hideList = function(index) {
		$(liArr[index]).children().last().fadeOut(100);
		$(liArr[index]).children().first().css({"color": "#fff","background-color": "#1c9e79"});
	}

	/**
	 * settlement function
	 */

	topRight.prototype.settlement = function(array) {
		var accounts = 0;
		$.each(array, function(index) {
			var price = $(array[index]).children(".cart-item-center").children(".price").children("span").text();
			return accounts += (price * 1);
		});
		$(".cart-info-price span:eq(1)").text(accounts);
	}

	/**
	 * total num function
	 */

	topRight.prototype.totalNum = function(array) {
		var sum = $(array).length;
		$(".cart-info-num span:eq(1)").text(sum);
	}

	topRight.prototype.listArray = [];

	/**
	 * mouse function for topRight
	 */

	topRight.prototype.mouse = function() {
		/**
		 * show and hide list
		 */
		var listArray = topRight.prototype.listArray;
		for (var i = 0; i < liArr.length; i++) {
			liArr[i].setAttribute("data-index", i);
			$(liArr[i]).mouseenter(function() {
				listArray.forEach(function(one) {
					clearTimeout(one);
				});
				listArray.length = 0;
				var index = this.getAttribute("data-index");
				var timer = setTimeout(topRight.prototype.showList(index), 0);
				listArray.push(timer);
			});
			$(liArr[i]).mouseleave(function() {
				listArray.forEach(function(one) {
					clearTimeout(one);
				});
				listArray.length = 0;
				var index = this.getAttribute("data-index");
				var timer = setTimeout(topRight.prototype.hideList(index), 0);
				listArray.push(timer);
			});
		}

		/**
		 * clear cookie
		 */

		$(".exit").click(function() {
			var cookieArr = document.cookie.split("; ");
			$.each(cookieArr, function(index) {
				var cookarr = cookieArr[index].split("=");
				document.cookie = cookarr[0]+"=; expires=Thu, 01 Jan 1970 00:00:00 GMT";
			});
			window.location.href = "./index.php";
		});

		/**
		 * cart Settlement
		 */

		topRight.prototype.settlement(cartLiArr);
		topRight.prototype.totalNum(cartLiArr);
		/**
		 * checkbox change event
		 */
		$.each(ckboxArr, function(index) {
			$(ckboxArr[index]).click(function() {
				$(this).prop("checked", $(this).prop("checked")?true:false);
				var cartLiArr = $(".cart .checkbox:checked").parent().parent();
				topRight.prototype.settlement(cartLiArr);
				topRight.prototype.totalNum(cartLiArr);
			});
		});
		/**
		 * select all
		 */
		$(".select-all").change(function() {
			$.each(ckboxArr, function(index) {
				$(ckboxArr[index]).prop('checked', $(".select-all").prop("checked")?true:false);
				var cartLiArr = $(".cart .checkbox:checked").parent().parent();
				topRight.prototype.settlement(cartLiArr);
				topRight.prototype.totalNum(cartLiArr);
			});
		});
		/**
		 * settlement to pay.php
		 */
		$(".settlement").click(function() {
			var checkedLiArr = $(".cart .checkbox:checked").parent().parent();
			var Obj = [];
			$.each(checkedLiArr, function(index) {
				var obj = [];
				obj[0] = $(checkedLiArr[index]).children(".cart-item-center").children(".name").text();
				obj[1] = $(checkedLiArr[index]).children(".cart-item-center").children(".price").children("span").text();
				Obj.push(obj);
			});
			if (Obj.length != 0) {
				var obj = encodeURI(JSON.stringify(Obj));
				window.location.href="./pay.php?obj="+obj;
			}
		});

		/**
		 * settlement only one to pay.php
		 */
		$(".cart .watch-order").click(function() {
			var Obj = [];
			var obj = [];
			obj[0] = $(this).parent().parent().children(".cart-item-center").children(".name").text();
			obj[1] = $(this).parent().parent().children(".cart-item-center").children(".price").children("span").text();
			Obj.push(obj);
			var obj = JSON.stringify(Obj);
			window.location.href = "./pay.php?obj="+obj;
		});
		/**
		 * delete cart
		 */

		var cart_delit_Btn = $(".cart .cart-item .delete-order");
		$.each(cart_delit_Btn, function(index) {
			$(cart_delit_Btn[index]).click(function() {
			var name = $(this).parent().parent().children(".cart-item-center").children(".name").text().slice(1,-1);
			$.ajax({
				method: 'POST',
				url: './deleteCart.php',
				data: {name: name},
				async: true,
				contentType: 'application/x-www-form-urlencoded; charset=UTF-8',
				dataType: 'text',
				success: function(data) {
					if (data === "删除成功") {
						infoTip(data);
						$(cart_delit_Btn[index]).parent().parent().remove();
						var cartLiArr = $(".cart .checkbox:checked").parent().parent();
						topRight.prototype.settlement(cartLiArr);
						topRight.prototype.totalNum(cartLiArr);
						return true;
					} else {
						infoTip(data);
						return false;
					}
				}
			});
			});
		});

		/**
		 * delete collect
		 */

		var coll_delit_Btn = $(".like .like-item .delete-order");
		$.each(coll_delit_Btn, function(index) {
			$(coll_delit_Btn[index]).click(function() {
				var name = $(this).parent().parent().children(".name").text().slice(1, -1);
				$.ajax({
					method: 'POST',
					url: './deleteCollect.php',
					data: {name: name},
					async: true,
					contentType: 'application/x-www-form-urlencoded; charset=UTF-8',
					dataType: 'text',
					success: function(data) {
						if (data === "删除成功") {
							infoTip(data);
							$(coll_delit_Btn[index]).parent().parent().remove();
							return true;
						} else {
							infoTip(data);
							return false;
						}
					}
				});
			});
		});

		/**
		 * delete history
		 */

		var hist_delit_Btn = $(".history .history-item .delete-order");
		$.each(hist_delit_Btn, function(index) {
			$(hist_delit_Btn[index]).click(function() {
				var historyBook = $(this).parent().parent().children("span").text().slice(1, -1);
				$.ajax({
					method: 'POST',
					url: './deleteHistory.php',
					data: {historyBook: historyBook},
					async: true,
					contentType: 'application/x-www-form-urlencoded; charset=UTF-8',
					dataType: 'text',
					success: function(data) {
						if (data === "删除历史记录成功！") {
							infoTip(data);
							$(hist_delit_Btn[index]).parent().parent().remove();
							return true;
						} else {
							infoTip(data);
							return false;
						}
					}
				});
			});
		});

	}

	var topright = factory("topRight");
	topright.mouse();

	/**
	* change account info object
	*/

	function account() {}

	account.prototype.changeInfo = function() {
		$.each(accInp, function(index) {
			$(accInp[index]).keydown(function() {
				$(".info-content .info-oper .save-info").removeClass("disabled");
			});
		});

		$(".info-content .info-oper .save-info").click(function() {
			if ($(this).hasClass("disabled")) {
				return false;
			} else {
				var accInfo = [];
				$.each(accInp, function(index) {
					accInfo.push($(accInp[index]).val());
				});
				$.ajax({
					method: 'POST',
					url: './updateAcc.php',
					data: {
						accInfo: accInfo
					},
					async: false,
					contentType: 'application/x-www-form-urlencoded; charset=UTF-8',
					dataType: 'text',
					success: function(data) {
						infoTip(data);
					}
				});
			}
		});
	}

	var Account = factory("account");
	Account.changeInfo();

	/**
	 * search type object
	 */

	function searchBtn() {}

	/**
	 * mouse function for searchBtn
	 */

	searchBtn.prototype.mouse = function() {
		search_btn.click(function() {
			search_btn.children().last().fadeIn(300);
		});
		search_btn.mouseleave(function() {
			search_btn.children().last().fadeOut(300);
		});
		$.each(typeListArr, function(index) {
			$(typeListArr[index]).click(function() {
				var text = $(this).text();
				$(".default").replaceWith("<span class='default'>" + text + "</span>");
			});
		});
	}

	var searchbtn = factory("searchBtn");
	searchbtn.mouse();

	/*
	 * hero
	 */

	function heroSlider() {}

	/*
	 * slide function
	 */

	heroSlider.prototype.direction = "next";
	heroSlider.prototype.order = 0; //轮播次序

	heroSlider.prototype.change = function() {
		var slide = $(".ui-viewport .slide"); //所有轮播图片
		var order = heroSlider.prototype.order;
		var direction = heroSlider.prototype.direction;
		var uiPaper = $(".ui-paper a");
		uiPaper.eq(order).removeClass("active");
		if (direction == "next") {
			order++;
			if (order > 6) {
				order = 0;
			}
		} else if (direction == "prev") {
			order--;
			if (order < 0) {
				order = 6;
			}
		}
		slide.eq(order).siblings().css({
			"opacity": 0,
			"z-index": -1
		});
		slide.eq(order).css({
			"opacity": 1,
			"z-index": 5
		});
		uiPaper.eq(order).addClass("active");
		heroSlider.prototype.order = order;
	}

	/*
	 * 图片轮播小球切换方法
	 */

	heroSlider.prototype.changeTo = function(index) {
		var slide = $(".ui-viewport .slide"); //所有轮播图片
		var uiPaper = $(".ui-paper a");
		uiPaper.removeClass("active");
		slide.eq(index).siblings().css({
			"opacity": 0,
			"z-index": -1
		});
		slide.eq(index).css({
			"opacity": 1,
			"z-index": 5
		});
		uiPaper.eq(index).addClass("active");
		heroSlider.prototype.order = index;
	}

	/*
	 * 翻页鼠标事件
	 */

	heroSlider.prototype.mouse = function() {
		//向前翻页
		var prev = $(".ui-controls-direction .prev");
		prev.click(function() {
			clearInterval(heroSliderTimer);
			heroSlider.prototype.direction = "prev";
			heroSlider.prototype.change();
		});
		//向后翻页
		var next = $(".ui-controls-direction .next");
		next.click(function() {
			clearInterval(heroSliderTimer);
			heroSlider.prototype.direction = "next";
			heroSlider.prototype.change();
		});

		$(".ui-paper a").click(function() {
			clearInterval(heroSliderTimer);
			var index = $(this).data("slide");
			heroSlider.prototype.changeTo(index);
		});
	}

	var heroslider = factory("heroSlider");
	var heroSliderTimer = setInterval(heroSlider.prototype.change, 5000);
	heroslider.mouse();

	/**
	 * info object
	 */

	function info() {}

	info.prototype.mouse = function() {
		$.each(servArr, function(index) {
			if($(servArr[index]).hasClass("active-info")) {
				$(this).addClass("active-info");
				$(this).siblings().removeClass("active-info");
				$(".service-con div").eq(index).siblings().css('display','none');
				$(".service-con div").eq(index).css('display','block');
			}
			$(servArr[index]).mouseenter(function() {
				$(this).addClass("active-info");
				$(this).siblings().removeClass("active-info");
				$(".service-con div").eq(index).siblings().css('display','none');
				$(".service-con div").eq(index).css('display','block');
			});
		});
	}

	var Info = factory("info");
	Info.mouse();

	/**
	 * categery object
	 */

	function categery() {};

	/**
	 * mouse function for categery
	 */

	categery.prototype.mouse = function() {
		$.each(cateLiArr, function(index) {
			$(cateLiArr[index]).mouseenter(function() {
				$.each(cateAArr, function(index) {
					$(cateAArr[index]).removeClass("active-cate");
				});
				$(cateAArr[index]).addClass("active-cate");
				$.each(subMenuArr, function(index) {
					$(subMenuArr[index]).fadeOut(100);
				});
				$(subMenuArr[index]).fadeIn(100);
			});
			$(cateLiArr[index]).mouseleave(function() {
				$(cateAArr[index]).removeClass("active-cate");
				$(subMenuArr[index]).fadeOut(100);
			});
		});
	}

	var Categery = factory("categery");
	Categery.mouse();

	/**
	 * recommend object
	 */

	function recommend() {}

	recommend.prototype.direction = 'next';   // 方向记录值

	recommend.prototype.mouse = function () {
		var direction = recommend.prototype.direction;
		$.each(recoListArr, function (index) {
			$(wrapArr[0]).addClass("active-wrap");
			$(recoListArr[index]).mouseenter(function() {
				$(wrapArr[index]).siblings().removeClass("active-wrap");
				$(wrapArr[index]).addClass("active-wrap");
			});
		});
		$(rec_ctrl[0]).click(function() {
			if(direction = "prev") {
				$(".active-wrap").animate({"left": "0px", "right": "1245px"},500, "swing");
			}
			recommend.prototype.direction = 'next';
		});
		$(rec_ctrl[1]).click(function() {
			if(direction = "next") {
				$(".active-wrap").animate({"right": "0px", "left": "-1245px"},500, "swing");
			}
			recommend.prototype.direction = 'prev';
		});
	}

	var Recommend = factory("recommend");
	Recommend.mouse();

	/**
	 * home page
	 * home tab object
	 */

	function homeCate() {}

	homeCate.prototype.temp = 0;

	var step = "250";
	var temp = homeCate.prototype.temp;
	homeCate.prototype.mouse = function() {
		$.each(homeLiArr, function(index) {
			$(homeCateBg).css("left", temp * step);
			$(homeLiArr[index]).mouseenter(function() {
				$(homeCateBg).css("left", index * step);
				$(this).children().first().addClass("active-a");
				$(this).siblings().children().first().removeClass("active-a");
			});
			$(homeLiArr[index]).mouseleave(function() {
				$(homeCateBg).css("left", temp * step);
				$(homeLiArr[temp]).children().first().addClass("active-a");
				$(homeLiArr[temp]).siblings().children().first().removeClass("active-a");
			});
			$(homeLiArr[index]).click(function() {
				$(this).children().first().addClass("active-a");
				$(this).siblings().children().first().removeClass("active-a");
				$(this).children().last().addClass("active-home");
				$(this).siblings().children().last().removeClass("active-home");
				return temp = index;
			});
		});
	}

	var HomeCate = factory("homeCate");
	HomeCate.mouse();

	/**
	 * form verify object
	 */

	function formVerify() {}

	formVerify.prototype.verifyInp = function (index) {
	 	/**
	 	 * 输入框值校验
	 	 */
		switch(index) {
			case 0:   // 手机号
				var tel = $(inpArr[0]).val();
				if (tel != "" /*&& reg.test(num) 匹配正则*/) {
					$(inpArr[0]).removeClass("active-inp error-inp");
					var bool;
					$.ajax({
						method: 'POST',
						url: './check.php',
						data: {num: tel},
						async: false,
						contentType: 'application/x-www-form-urlencoded; charset=UTF-8',
						dataType: 'text',
						success: function(data) {
							bool = data;
						}
					});
					if (bool == "true") {
						return true;
					} else if (bool == "false"){
						return false;
					}
				} else {
					$(inpArr[0]).removeClass("active-inp");
					$(inpArr[0]).addClass("error-inp");
					infoTip("请输入手机号");
					return false;
				}
			break;
			case 1:   // 验证码
				if ($(inpArr[index]).val() != ""/* && 验证码匹配 */) {
					$(inpArr[index]).removeClass("active-inp error-inp");
					return true;
				} else {
					$(inpArr[index]).removeClass("active-inp");
					$(inpArr[index]).addClass("error-inp");
					infoTip("请填写验证码");
					return false;
				}
			break;
			case 2:  // 密码
				if ($(inpArr[index]).val() != "") {
					$(inpArr[index]).removeClass("active-inp error-inp");
					return true;
				} else {
					$(inpArr[index]).removeClass("active-inp");
					$(inpArr[index]).addClass("error-inp");
					infoTip("请填写密码");
					return false;
				}
			break;
			case 3:   // 确认密码
				if ($(inpArr[index]).val() != "") {
					$(inpArr[index]).removeClass("active-inp error-inp");
					if ($(inpArr[index-1]).val() === $(inpArr[index]).val()) {
						$(inpArr[index]).removeClass("active-inp error-inp");
						$(inpArr[index-1]).removeClass("active-inp error-inp");
						return true;
					} else {
						$(inpArr[index]).removeClass("active-inp");
						$(inpArr[index-1]).removeClass("active-inp");
						$(inpArr[index]).addClass("error-inp");
						$(inpArr[index-1]).addClass("error-inp");
						infoTip("两次密码不一致");
						return false;
					}
				} else {
					$(inpArr[index]).removeClass("active-inp");
					$(inpArr[index]).addClass("error-inp");
					infoTip("请再次输入密码");
					return false;
				}
			break;
		}
	}

	 formVerify.prototype.verify = function() {

	 	$.each(inpArr, function(index) {
	 		$(inpArr[index]).click(function() {
	 			$(this).removeClass("error-inp");
	 			$(this).addClass("active-inp");
	 		});
	 	});

	 	$.each(inpArr, function(index) {
	 		$(inpArr[index]).blur(function() {
	 			$(this).removeClass("active-inp");
	 		});
	 	});

		/**
		 * 计时器
		 */

	 	$(".yzm").click(function() {
	 		if ($(inpArr[0]).val() != "") {
		 		if (formVerify.prototype.verifyInp(0)) {
		 			$(".regist-one .inp").removeClass("error-inp");
			 		$(this).addClass("disabled");
			 		var time = 900;
			 		var timer = setInterval(function() {
			 			time --;
			 			$(".yzm").val("剩余("+ time +")秒");
			 			return time = time;
			 		}, 1000);
		 		} else {
		 			$(".regist-one .inp").addClass("error-inp");
		 			infoTip("该账号已注册");
		 			return false;
		 		}
	 		} else {
	 			$(".regist-one .inp").addClass("error-inp");
	 			infoTip("请输入手机号");
	 			return false;
	 		}
	 	});

	 	/**
	 	 * 下一步按钮
	 	 */
	 	$.each(nextArr, function(index) {
	 		$(nextArr[index]).click(function() {
 				var verifybool = formVerify.prototype.verifyInp(index);
 				if (verifybool) {
	 				if($(".yzm").hasClass("disabled")) {
	 					var step = 500;
	 					$(".regist-wrap").css("margin-left", (index + 1) * -step + "px");
	 					$(".regist-process span").css("margin-left",(index + 1) * 125 + "px");
	 				} else {
	 					infoTip("请获取验证码");
	 					return false;
	 				}
	 			} else {
	 				return false;
	 			}
	 		});
	 	});

	 	/**
	 	 * home page regist
	 	 */

	 	$(".home .regist .regist-btn").click(function() {
	 		var verifybool = formVerify.prototype.verifyInp(3);
	 		if (verifybool) {
			 	var tel = $(inpArr[0]).val();
				var pwd = $(inpArr[3]).val();
				var bool;
				$.ajax({
					method: 'POST',
					url: './regist.php',
					data: {
						tel: tel,
						pwd: pwd
					},
					async: false,
					contentType: 'application/x-www-form-urlencoded; charset=UTF-8',
					dataType: 'text',
					success: function(data) {
						bool = data;
						infoTip(data);
					}
				});
				if (bool === "注册成功") {
					window.location.href = "./index.php";
					return true;
				} else if (bool === "注册失败"){
					return false;
				}
	 		} else {
	 			return false;
	 		}
	 	});

	 	/**
	 	 * home page login verify
	 	 */

	 	$.each(logInpArr, function(index) {
	 		$(logInpArr[index]).click(function() {
	 			$(this).addClass("active-inp");
	 		});
	 	});

		$(".login-wrap").children().last().click(function() {
			var telText = $(".login-wrap input.inp:eq(0)").val();
			var pwdText = $(".login-wrap input.inp:eq(1)").val();
			if (telText != "") {
				$(".login-wrap input.inp:eq(0)").removeClass("active-inp error-inp");
				if(pwdText != "") {
					$(".login-wrap input.inp:eq(1)").removeClass("active-inp error-inp");
					$.ajax({
						method: 'POST',
						url: './login.php',
						data: {
							tel: telText,
							pwd: pwdText
						},
						async: false,
						contentType: 'application/x-www-form-urlencoded; charset=UTF-8',
						dataType: 'text',
						success: function(data) {
							if (data === "手机号或密码不正确！") {
								infoTip(data);
								return false;
							} else if (data === "用户名和密码不存在！") {
								infoTip(data);
								return false;
							} else if (data === "ok,欢迎回来~"){
								window.location.href="index.php";
								infoTip(data);
							}
						}
					});
					return true;
				} else {
					$(".login-wrap input.inp:eq(1)").addClass("error-inp");
					return false;
				}
			} else {
				$(".login-wrap input.inp:eq(0)").addClass("error-inp");
				return false;
			}
		});
	 }


	 var FormVerify = factory("formVerify");
	 FormVerify.verify();

	 /**
	  * pay page
	  */

	 function pay() {}

	 /**
	  * total money function
	  */

	 pay.prototype.totalMoney = function(array) {
	 	var sum_total_money = 0;
		$.each(array, function(index) {
			var num = $(array[index]).children("td:eq(1)").children(".pay-num").val();
			var price = $(array[index]).children(".pay-price").text();
			var totalPrice = num * price;
			$(array[index]).children("td:eq(3)").text(totalPrice);
			return sum_total_money += totalPrice;
		});
		$("table").siblings().children("span").text(sum_total_money);
	 }

	 /**
	  * 页面打开时先调一次
	  */
	 pay.prototype.totalMoney(trArr);

	 pay.prototype.mouse = function () {

	 	/**
	 	 * 为每个down 和 up 按钮绑定事件
	 	 */
	 	var num_btn = $(".pay-con tbody tr td button");
	 	$.each(num_btn, function(index) {
	 		$(num_btn[index]).click(function() {
				var num = $(this).parent().children(".pay-num").val();
	 			if ($(this).hasClass("down")) {
	 				num --;
	 				if(num < 1) {
	 					num = 1;
	 				}
	 				$(this).parent().children(".pay-num").attr("value", num);
	 				var trArr = $(this).parent().parent().parent().children();
	 				pay.prototype.totalMoney(trArr);
	 				return;
	 			} else if ($(this).hasClass("up")){
	 				num ++;
	 				$(this).parent().children(".pay-num").attr("value", num);
	 				var trArr = $(this).parent().parent().parent().children();
	 				pay.prototype.totalMoney(trArr);
	 				return;
	 			}
	 		});
	 	});

	 	/**
	 	 * 当输入框中的值改变时触发
	 	 */
	 	var pay_inpArr = $(".pay-con tbody .pay-num");
	 	$.each(pay_inpArr, function(index) {
	 		$(pay_inpArr[index]).blur(function() {
	 			var num = $(this).val();
	 			$(this).attr("value", num);
	 			var trArr = $(this).parent().parent().parent().children();
				pay.prototype.totalMoney(trArr);
	 		});
	 	});

		/**
			* click payfor btn add to order
			*/

			$(".pay-con p button").click(function() {
				var orderInfo = [];
				$.each(trArr, function(index) {
					var orderItem = [];
					orderItem[0] = $(trArr[index]).children("td:eq(0)").text().slice(1,-1);
					orderItem[1] = $(trArr[index]).children("td:eq(1)").children("input").val();
					orderInfo.push(orderItem);
				});
				$.ajax({
		 			method: 'POST',
		 			url: './addToOrder.php',
		 			data: {
						orderInfo: JSON.stringify(orderInfo)
					},
		 			async: false,
		 			traditional: true,
					contentType: 'application/x-www-form-urlencoded; charset=UTF-8',
					dataType: 'text',
					success: function(data) {
						if (data === "已添加到订单列表") {
							window.location.href="./paysuccess.php?orderInfo="+orderInfo.length;
						}
					}
		 		});
			});

	 }

	 var Pay = factory("pay");
	 Pay.mouse();

	 /**
	  * detail page
	  */

	 function detail() {}

	 /**
	  * click add cart function
	  */

	 detail.prototype.mouse = function() {
	 	var addCartBtn = $(".detailPage .det-center-botm input:eq(0)");
	 	$(addCartBtn).click(function() {
			var cart_bookname = $(".detailPage .detail-center .detail-name").text().slice(1, -1);
			$.ajax({
				method: 'POST',
				url: './addToCart.php',
				data: {cart_bookname: cart_bookname},
				async: true,
				contentType: 'application/x-www-form-urlencoded; charset=UTF-8',
				dataType: 'text',
				success: function(data) {
					infoTip(data);
				}
			});
	 	});

		 /**
		  * click add collect function
		  */
		 var addcollBtn = $(".detailPage .det-center-botm input:eq(1)");
		 $(addcollBtn).click(function() {
			 var bookname = $(".detailPage .detail-center .detail-name").text().slice(1, -1);
				$.ajax({
					method: 'POST',
					url: './addToCollect.php',
					data: {
						bookname: bookname
					},
					async: true,
					contentType: 'application/x-www-form-urlencoded; charset=UTF-8',
					dataType: 'text',
					success: function(data) {
						infoTip(data);
					}
				});
	 	});

	 }

	 var Detail = factory("detail");
	 Detail.mouse();

})();
