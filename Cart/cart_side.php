<!DOCTYPE html>
<html>

<head>
	<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script> -->
	<script>
		var price;

		function re_p_info(){
			
			$.ajax({
				url: 'Cart/all_item_ajax.php',
				data: {
				},
				type: 'POST',
				dataType: "json",
				success: function(Jdata) {
					price=Jdata;
				},
				error: function(xhr, ajaxOptions, thrownError) {}
			});
		}
		$(function() {
			re_p_info();
			// var h1 = '<div class="cart_big">' + $(".cart_big").html() + '</div>';
			var flag = false;
			var check1 = false;
			$('[name="btn_cart"]').unbind('click');
			// $('.cart_big').remove();
			$('.cart_big').css('display', 'none');
			$('[name="btn_cart"]').click(function(event) {
				if (!flag) {
					// $('body').append(h1);
					$('.cart_big').css('display', 'block');
					$('.back_black').css('animation-name', 'back_black_ani');
					$('.cart_cover').css('animation-name', 'cart_cover_ani');
					flag = true;
				}
				$('[name="btn_rem"]').click(function() {
					// h1 = '<div class="cart_big">' + $(".cart_big").html() + '</div>';
					setTimeout(function() {
						$('.back_black').css('animation-name', 'back_black_ani2');
					}, 1);
					setTimeout(function() {
						$('.cart_cover').css('animation-name', 'cart_cover_ani2');
					}, 1);
					// setTimeout(function() {
					// 	$('.cart_big').remove();
					// }, 300);
					setTimeout(function() {
						$('.cart_big').css('display', 'none');
					}, 300);
					flag = false;
				});
				$('.back_black').click(function() {
					// h1 = '<div class="cart_big">' + $(".cart_big").html() + '</div>';
					setTimeout(function() {
						$('.back_black').css('animation-name', 'back_black_ani2');
					}, 1);
					setTimeout(function() {
						$('.cart_cover').css('animation-name', 'cart_cover_ani2');
					}, 1);
					// setTimeout(function() {
					// 	$('.cart_big').remove();
					// }, 300);
					setTimeout(function() {
						$('.cart_big').css('display', 'none');
					}, 300);
					flag = false;
				});
				var count;
				var max = 100
				var this_item_cnt;
				var this_item_id;
				// var price = [1680, 1580, 1380, 1680, 1680, 2150, 220, 250, 650, 1880, 2980, 1580];
				$(".quentity").find("input").keyup(function() {
					var max = 100;
					var ind = parseInt($(this).attr('name'));
					var re = /^[0-9] .?[0-9]*/; //正規
					count = $(this).val();
					max = parseInt($(this).closest(".quentity").find('[name="p_q"]').html());
					if (!re.test(count) && count.length != 0 && !isNaN(parseInt(count))) {
						count = parseInt(count);
						if (count > max) {
							$(this).val(max);
							count = max;
						} else if (count < 1) {
							$(this).val(1);
							count = 1;
						}
						$(this).attr('value', count);
						$(this).val(count);
					} else {
						count = 1;
						$(this).attr('value', count);
					}
					cart(count, $(this).attr('name')); //存session
					//改小計
					var new_tot = count * price[ind];
					new_tot = new_tot.toLocaleString(); //千分位逗號
					$(this).closest($('.p_body')).find($("[name='subtotal']")).text("NT$" + new_tot);
					//改總價
					var tot_cost = 0;
					$("[name='subtotal']").each(function() {
						tot_cost = tot_cost + parseInt($(this).text().replace(/[^\d]/g, ''));
						console.log(tot_cost);
					})
					tot_cost = tot_cost.toLocaleString();
					$('#price').text("金額：NT$" + tot_cost);
					//改購買量
					var tot_q = 0;
					$(".quentity").find("input").each(function() {
						if ($(this).val().replace(/[^\d]/g, '') == '') {
							tot_q = tot_q + 1;
						} else tot_q = tot_q + parseInt($(this).val().replace(/[^\d]/g, ''));
						console.log(tot_q);
					})
					$('[name="tot_q"]').text("已加入了" + tot_q + "項商品");
				})
				$(".quentity").find("input").blur(function() {
					if ($(this).val().replace(/[^\d]/g, '') == '') {
						$(this).val(1);
					}
				})
				$("[name='add']").click(function(e) {
					if (!check1) {
						check1 = true;
						this_item_cnt = $(this).closest('div').find("input"); //找到單個商品數量框
						count = this_item_cnt.val(); //單個商品數量框的值
						if (count <= max) {
							count++; //數量增加
							this_item_cnt.attr({
								"value": count
							}); //找到改變數量
							this_item_cnt.val(count);
							var tmp_tot = $('#price').text();
							tmp_tot = parseInt(tmp_tot.replace(/[^\d]/g, ''));
							tmp_tot += parseInt(price[parseInt(this_item_cnt.attr('name'))]);
							tmp_tot = tmp_tot.toLocaleString();
							$('#price').text("NT " + tmp_tot);
							var q = parseInt($('.tit').find('h6').text().replace(/[^\d]/g, ''));
							$('.tit').find('h6').text("已加入了" + (q+1) + "項商品");
						}
						cart(this_item_cnt.val(), this_item_cnt.attr('name')); //存session
						var new_tot = count * parseInt(price[parseInt(this_item_cnt.attr('name'))]);
						new_tot = new_tot.toLocaleString(); //千分位逗號
						$(this).closest('div').parent().parent().find('p').text("NT$" + new_tot);
					} else {
						check1 = false;
					}
				})
				$("[name='reduce']").click(function() {
					if (!check1) {
						check1 = true;
						this_item_cnt = $(this).closest('div').find("input"); //找到單個商品數量框
						count = this_item_cnt.val(); //單個商品數量框的值
						if (count > 1) {
							count--; //數量增加
							this_item_cnt.attr({
								"value": count
							}); //找到改變數量
							this_item_cnt.val(count);
							var tmp_tot = $('#price').text();
							tmp_tot = parseInt(tmp_tot.replace(/[^\d]/g, ''));
							tmp_tot -= price[parseInt(this_item_cnt.attr('name'))];
							tmp_tot = tmp_tot.toLocaleString();
							$('#price').text("NT " + tmp_tot);
							var q = parseInt($('.tit').find('h6').text().replace(/[^\d]/g, ''));
							$('.tit').find('h6').text("已加入了" + (q-1) + "項商品");
						}
						cart(this_item_cnt.val(), this_item_cnt.attr('name')); //存session
						var new_tot = count * parseInt(price[parseInt(this_item_cnt.attr('name'))]);
						new_tot = new_tot.toLocaleString(); //千分位逗號
						$(this).closest('div').parent().parent().find('p').text("NT$" + new_tot);
					} else {
						check1 = false;
					}
				})
				$('[name="del"]').click(function() {
					if (!check1) {
						this_item_cnt = $(this).closest('.item_box_contaner').find('input'); //找到單個商品數量框
						check1 = true;
						var tmp_tot = $('#price').text();
						tmp_tot = tmp_tot.replace(/[^\d]/g, '');
						tmp_tot -= this_item_cnt.val() * parseInt(price[parseInt(this_item_cnt.attr('name'))]);
						tmp_tot = tmp_tot.toLocaleString();
						
						$('#price').text("NT " + tmp_tot);
						var q = parseInt($('.tit').find('h6').text().replace(/[^\d]/g, ''));
						if (q - this_item_cnt.val() > 0)
							$('.tit').find('h6').text("已加入了" + (q - this_item_cnt.val()) + "項商品");
						else $('.tit').find('h6').text('');
						cart(0, this_item_cnt.attr('name')); //存session
						$(this).closest('.item_box').next().remove();
						$(this).closest('.item_box').remove();
					} else {
						check1 = false;
					}
				})
				$('[name="clear_all"]').click(function() {
					if (!check1) {
						check1 = true;
						$('[name="del"]').each(function() {
							$(this).click();
						})
					} else {
						check1 = false;
					}
				})
			});
		});

		function cart(num, id) {
			$.ajax({
				url: 'Cart/Cart_Session.php',
				data: {
					'num': num,
					'id': id
				},
				type: 'POST',
				dataType: "json",
				success: function() {},
				error: function(xhr, ajaxOptions, thrownError) {}
			});
		}
	</script>
	<style>
		.cart_big h6 {
			margin: 0;
		}

		.cart_big {
			position: fixed;
			top: 0px;
			left: 0px;
			height: 100%;
			width: 100%;
			overflow: auto;
			z-index: 10;
			pointer-events: none;
		}

		.back_black {
			display: flex;
			position: fixed;
			top: 0px;
			left: 0px;
			background-color: black;
			height: 100%;
			width: 100%;
			overflow: hidden;
			opacity: 0.7;
			animation-name: back_black_ani;
			animation-duration: 300ms;
			animation-timing-function: ease-in-out;
			animation-fill-mode: forwards;
			pointer-events: all;
		}

		.cart_cover {
			display: flex;
			position: fixed;
			top: 0px;
			overflow: auto;
			height: 100%;
			width: 100%;
			pointer-events: none;
			animation-name: cart_cover_ani;
			animation-duration: 300ms;
			animation-timing-function: ease-in-out;
			animation-fill-mode: forwards;
		}

		.cart_cover>* {
			pointer-events: all;
		}

		.cart_contant {
			display: flex;
			flex-direction: column;
			position: absolute;
			top: 0px;
			bottom: 0px;
			right: 0px;
			height: 100%;
			width: 100%;
			background-color: rgb(244, 240, 238);
		}

		.cart_title {
			display: flex;
			-webkit-box-pack: center;
			/*div內子元素置中*/
			justify-content: center;
			-webkit-box-align: center;
			/*div內子元素置中*/
			box-shadow: rgb(0 0 0 / 20%) 0px 0px 8px;
			align-items: center;
			flex-shrink: 0;
			background-color: rgb(239, 232, 228);
			position: relative;
			z-index: 1;
			flex-basis: 80px;
			height: 80px;
		}

		.cart_title .tit {
			display: flex;
			flex-direction: column;
			-webkit-box-align: center;
			align-items: center;
		}

		.cart_title .close_b {
			display: flex;
			position: absolute;
			top: 50%;
			right: 10px;
			transform: translateY(-50%);
			cursor: pointer;
			padding: 10px;
		}

		.cart_body {
			-webkit-box-flex: 1;
			flex-grow: 1;
			flex-shrink: 1;
			display: flex;
			flex-direction: column;
			-webkit-box-align: center;
			align-items: center;
			background-color: rgb(244, 240, 238);
			overflow: auto;
			height: 100%;
		}

		.btn-outline-dark {
			padding: 0.5em 0.8em;
			border-radius: 0.5em;
		}

		.btn-link {
			color: crimson;
		}

		.cart_footer {
			padding: 10px 20px;
			box-shadow: rgb(0 0 0 / 20%) 0px 0px 8px;
			display: flex;
			background: rgb(239, 232, 228);
			z-index: 1;
			height: auto;
			flex-basis: 96px;
			flex-shrink: 0;
			/* margin-bottom: 1em; */
		}

		.cart_item_boxes {
			padding: 0px;
			-webkit-box-flex: 1;
			flex-grow: 1;
			display: flex;
			background-color: rgb(239, 232, 228);
			margin-top: 10px;
			border-radius: 0px;
			align-self: stretch;
			flex-direction: column;
			-webkit-box-align: stretch;
			align-items: stretch;
			flex-shrink: 0;
			box-shadow: none;
		}

		.items_boxes {
			padding-top: 10px;
			padding-right: 20px;
			padding-left: 20px;
		}

		.smail_title_clear {
			display: flex;
			flex-direction: row;
			-webkit-box-pack: justify;
			justify-content: space-between;
			-webkit-box-align: center;
			align-items: center;
		}

		.item_box {
			margin: 5px;

		}

		.item_box_contaner {
			width: 100%;
			display: flex;
			flex-direction: row;
		}

		.item {
			display: flex;
			flex-direction: row;
			-webkit-box-pack: justify;
			justify-content: space-between;
			-webkit-box-align: stretch;
			align-items: stretch;

		}

		.p_img {
			display: flex;
			flex-direction: column;
			-webkit-box-pack: start;
			justify-content: flex-start;
			margin-right: 10px;
		}

		.p_img img {
			width: 80px;
			height: 80px;
			/*object-fit: cover;*/
			border-radius: 5px;
		}

		.p_function {
			display: flex;
			flex-direction: column;
			-webkit-box-align: stretch;
			align-items: stretch;
			align-content: flex-start;
			width: 100%;
		}

		.p_function .p_title {
			margin: 5px 0;
			width: 100%;
			display: flex;
			flex-direction: row;
			-webkit-box-pack: justify;
			justify-content: space-between;
			align-items: flex-start;
		}

		.p_function .p_title svg {
			vertical-align: top;
		}

		.p_function .p_body {
			width: 100%;
			display: flex;
			flex-direction: row;
			-webkit-box-pack: justify;
			justify-content: space-between;
			-webkit-box-align: center;
			align-items: center;
		}

		.p_body .quentity {
			display: flex;
			-webkit-box-align: center;
			align-items: center;
		}

		.cart_footer_box {
			width: 100%;
			display: flex;
			flex-direction: column;
			-webkit-box-pack: center;
			justify-content: center;
			-webkit-box-align: center;
			align-items: center;
		}

		.cart_footer .total {
			width: 100%;
			/*margin-bottom: 10px;*/
			display: flex;
			flex-direction: row;
			-webkit-box-pack: justify;
			justify-content: space-between;

		}

		/*不讓箭頭出現 */
		input[type=number]::-webkit-outer-spin-button,
		input[type=number]::-webkit-inner-spin-button {
			-webkit-appearance: none;
			margin: 0;
		}

		/* Firefox 不讓箭頭出現*/
		input[type=number] {
			-moz-appearance: textfield;
		}

		/*html,body{	
			}*/
		@media (min-width: 1024px) {
			.cart_contant {
				width: 450px;
			}

			.cart_body {
				max-height: calc((100% - 80px) - 96px);
				height: auto;
			}
		}

		@keyframes back_black_ani {
			0% {
				opacity: 0;
				display: flex;
			}

			100% {
				opacity: 0.5;
				display: flex;
			}
		}

		@keyframes back_black_ani2 {
			0% {
				opacity: 0.5;
				display: flex;
			}

			100% {
				opacity: 0;
				display: none;
			}
		}

		@keyframes cart_cover_ani {
			0% {
				transform: translateX(50px) translateY(0px);
				opacity: 0;
				display: flex;
			}

			100% {
				transform: translateX(0px) translateY(0px);
				opacity: 1;
				display: flex;
			}
		}

		@keyframes cart_cover_ani2 {
			0% {
				transform: translateX(0px) translateY(0px);
				opacity: 1;
				display: flex;
			}

			100% {
				transform: translateX(50px) translateY(0px);
				opacity: 0;
				display: none;
			}
		}
	</style>
	<!--表示使用css語法	-->
	<script type="text/javascript"></script>
	<!--表示使用javascript語法	-->
</head>

<body>
	<label style="position:fixed; z-index:9; top:50%;right:0; font-size:33pt; background-color:white; opacity:0.5; margin:0;" name='btn_cart'>
		<svg xmlns="http://www.w3.org/2000/svg" width="33" height="33" fill="currentColor" class="bi bi-chevron-compact-left" viewBox="0 0 16 16">
			<path fill-rule="evenodd" d="M9.224 1.553a.5.5 0 0 1 .223.67L6.56 8l2.888 5.776a.5.5 0 1 1-.894.448l-3-6a.5.5 0 0 1 0-.448l3-6a.5.5 0 0 1 .67-.223z" />
		</svg>
		<input type="checkbox" style="display:none;">
	</label>
	<div class='cart_big'>
		<!-- 灰黑濾鏡+購物車容器 -->
		<div class='back_black'>
			<!-- 灰黑濾鏡 -->
		</div>
		<div tabindex="-1">
			<div class="cart_cover">
				<!-- 購物車事件觸發容器 -->
				<div class="cart_contant">
					<!-- 購物車所有物容器 -->
					<div class="cart_title">
						<!-- 購物車標題及close按鈕 -->
						<div class="tit">
							<h5 style="margin: 0;"><b>購物車</b></h5>
							<?php if (isset($_SESSION['total']) && $_SESSION['total'] > 0) echo '<h6 name="tot_q">已加入了' . $_SESSION['total'] . '項商品</h6>'; ?>
						</div>
						<div class="close_b" name='btn_rem'>
							<svg width="18px" height="18px" viewBox="0 0 26 27" xmlns:xlink="http://www.w3.org/1999/xlink">
								<title>關閉</title>
								<defs>
									<rect width="39" height="39" rx="5"></rect>
								</defs>
								<g transform="translate(-6 -6)" fill="none" fill-rule="evenodd">
									<g transform="rotate(135 17.586 18.914)">
										<rect fill="#000000" y="15.448" width="34" height="4" rx="2"></rect>
										<rect fill="#000000" transform="rotate(90 17 17.448)" y="15.448" width="34" height="4" rx="2"></rect>
									</g>
								</g>
							</svg>
						</div>
					</div>
					<div class="cart_body">
						<!-- 購物車本體 -->
						<div class="cart_item_boxes">
							<!-- 購物車外層容器 -->
							<div class="items_boxes">
								<!-- 購物車內層容器 -->
								<div class="smail_title_clear">
									<!-- 小標題與清空案紐 -->
									<h6>商品已加入</h6>
									<h6 tabindex="0" style='cursor:pointer' class="btn btn-link" name="clear_all"><u><i class="bi bi-trash"></i>清空購物車</u></h6>
								</div>

								<hr><!-- 分隔商品線 -->
								<?php
								$price=$_SESSION['products']['price'];
								// $price = array(1 => "1,680", "1,580", "1,380", "1,680", "1,680", "2,150", "220", "250", "650", "1,880", "2,980", "1,580");
								$p_name = $_SESSION['products']['name'];
								$_SESSION['tot_price'] = 0;
								$arr = array();
								$brr = array();
								if (isset($_SESSION['cart_id']))
									for ($i = 0; $i < count($_SESSION['cart_id']); $i++) {
										$p_id = $_SESSION['cart_id'][$i];
										$_SESSION['tot_price'] += (intval($price[$p_id]) * $_SESSION['tmp_num'][$i]);
										$p_stock = $_SESSION['products']['stock'][$p_id];
										array_push($arr, $p_id);
										array_push($brr, $_SESSION['tmp_num'][$i]);
										echo '<div class="item_box"><!-- 商品本體 -->
										<div class="item">
											<!--商品外層容器 -->
											<div class="item_box_contaner">
												<!--商品內層容器 -->
												<div class="p_img"><!-- 商品圖片 -->
													<img src="product_pic/no' . $p_id . '.svg">
												</div>
												<div class="p_function" width="100%">
													<div class="p_title">
														<h6>' . $p_name[$p_id] . '</h6>
														<div style="width: 20px;height: 20px;cursor: pointer;" name="del">
															<svg width="18px" height="18px" viewBox="0 0 32 34">
																<title>刪除</title><g transform="translate(-4 -2)" fill="none" fill-rule="evenodd"><rect width="39" height="39" rx="5"></rect><path d="M34.968 7.865a.689.689 0 0 0-.508-.199h-6.842l-1.55-3.696c-.22-.546-.618-1.01-1.193-1.394-.576-.383-1.16-.576-1.75-.576h-7.083c-.59 0-1.173.193-1.749.576-.576.383-.974.848-1.195 1.394l-1.55 3.696h-6.84a.69.69 0 0 0-.509.2.693.693 0 0 0-.199.509V9.79a.69.69 0 0 0 .199.51.691.691 0 0 0 .51.199h2.125v21.073c0 1.225.346 2.269 1.04 3.132C8.567 35.57 9.4 36 10.374 36h18.418c.974 0 1.808-.447 2.502-1.338.692-.895 1.04-1.953 1.04-3.178V10.5h2.126a.69.69 0 0 0 .508-.2.691.691 0 0 0 .199-.509V8.375a.694.694 0 0 0-.2-.51zM15.71 5.077a.627.627 0 0 1 .376-.245h7.017c.148.031.274.112.376.245l1.062 2.59h-9.916l1.085-2.59zM29.5 31.484c0 .325-.051.624-.155.897-.103.273-.21.472-.32.597-.111.126-.188.189-.233.189H10.375c-.044 0-.121-.063-.233-.189-.11-.125-.217-.324-.32-.597a2.507 2.507 0 0 1-.154-.897V10.5H29.5v20.984zm-16.292-2.567h1.417a.689.689 0 0 0 .51-.199.691.691 0 0 0 .198-.51v-12.75a.69.69 0 0 0-.199-.509.689.689 0 0 0-.51-.199h-1.416a.692.692 0 0 0-.51.2.696.696 0 0 0-.198.509v12.75c0 .207.066.375.199.51a.692.692 0 0 0 .509.198zm5.668 0h1.416a.689.689 0 0 0 .508-.199.687.687 0 0 0 .2-.51v-12.75a.686.686 0 0 0-.2-.509.689.689 0 0 0-.508-.199h-1.416a.689.689 0 0 0-.51.2.69.69 0 0 0-.199.509v12.75c0 .207.066.375.2.51a.689.689 0 0 0 .509.198zm5.665 0h1.417a.689.689 0 0 0 .51-.199.691.691 0 0 0 .199-.51v-12.75a.69.69 0 0 0-.2-.509.689.689 0 0 0-.509-.199h-1.417a.687.687 0 0 0-.508.2.687.687 0 0 0-.2.509v12.75c0 .207.066.375.2.51a.687.687 0 0 0 .508.198z" fill="#34240d"></path></g>
															</svg>
														</div><!-- 移除紐 -->
													</div>
													<div class="p_body">
														<div class="quentity">
															<button name="reduce" class="btn btn-outline-dark">-</button>
															<div style="width: 65px;padding:0 10px;">
																<h7 name="p_q" style="display:none">' . $p_stock . '</h7>

																<input type="number" name=' . $p_id . ' style="width: 100%; text-align: center;" value="' . $_SESSION['tmp_num'][$i] . '" class="form-control form-control-sm">
															</div>
															<button name="add" class="btn btn-outline-dark">+</button>
														</div>
														<p style="margin-top:1rem; line-height: 1.375rem" name="subtotal">NT ';
										$d = (intval($price[$p_id]) * $_SESSION['tmp_num'][$i]) . "";
										for ($j = 0; $j < strlen($d); $j++) {
											echo $d[$j];
											if ((strlen($d) - $j) % 3 == 1 && $j < strlen($d) - 1) {
												echo ",";
											}
										}
										echo '</p>
													</div>
												</div>
											</div>
										</div>
									</div>
									<hr><!-- 分隔商品線 -->';
									}
								?>
							</div>
						</div>
					</div>
					<div class="cart_footer">
						<div class="cart_footer_box">
							<div class="total">
								<p style="line-height: 1rem">合計：</p>
								<p style="line-height: 1rem" id='price' name='price'><?php if (isset($_SESSION['tot_price']) && $_SESSION['tot_price'] > 0) echo 'NT ' . $_SESSION['tot_price']; ?></p>
							</div>
							<button style="width:90%; border-radius:50px; height: 50px" onclick="location.href='Cart/cart.php'">去結帳</button>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>

</html>