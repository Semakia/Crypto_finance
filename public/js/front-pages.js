(()=>{var e={3819:()=>{"use strict";listen("submit","#callToActionForm",(function(e){e.preventDefault(),$.ajax({url:route("landing.call-to-actions"),type:"post",data:$(this).serialize(),success:function(e){e.success&&(iziToast.success({title:"Success",message:e.message,position:"topRight"}),$("#callToActionForm")[0].reset())},error:function(e){iziToast.error({title:"Error",message:e.responseJSON.message,position:"topRight"}),$("#callToActionForm")[0].reset()}})}))},9418:()=>{"use strict";listen("submit","#getInTouchForm",(function(e){e.preventDefault(),$.ajax({url:route("landing.contact.store"),type:"post",data:$(this).serialize(),success:function(e){e.success&&iziToast.success({title:"Success",message:e.message,position:"topRight"}),$("#getInTouchForm")[0].reset()},error:function(e){iziToast.error({title:"Error.",message:e.responseJSON.message,position:"topRight"})}})}))},3147:()=>{"use strict";window.listen=function(e,t,a){$(document).on(e,t,a)},window.listenClick=function(e,t){$(document).on("click",e,t)},window.listenSubmit=function(e,t){$(document).on("submit",e,t)},window.listenHiddenBsModal=function(e,t){$(document).on("hidden.bs.modal",e,t)},window.listenChange=function(e,t){$(document).on("change",e,t)},window.listenKeyup=function(e,t){$(document).on("keyup",e,t)}},705:()=>{"use strict";listen("submit","#addEmailForm",(function(e){e.preventDefault(),$.ajax({url:route("email.subscribe.store"),type:"POST",data:new FormData(this),processData:!1,contentType:!1,success:function(e){e.success&&(iziToast.success({title:"Success",message:e.message,position:"topRight"}),$("#addEmailForm")[0].reset())},error:function(e){iziToast.error({title:"Error",message:e.responseJSON.message,position:"topRight"}),$("#addEmailForm")[0].reset()}})}))},901:()=>{"use strict";document.addEventListener("DOMContentLoaded",(function(){$(" .owl_1").owlCarousel({loop:!1,margin:2,responsiveClass:!0,autoplayHoverPause:!0,autoplay:!0,slideSpeed:400,paginationSpeed:400,autoplayTimeout:3e3,responsive:{0:{items:1,nav:!0,loop:!1},375:{items:2,nav:!0,loop:!1},600:{items:3,nav:!0,loop:!1},1e3:{items:4,nav:!0,loop:!1},1199:{items:5,nav:!0,loop:!1}}}),$(document).ready((function(){var e=$(".owl-item a ");$(".owl-item a ").on("click",(function(){e.removeClass("active"),$(this).addClass("active")}))}))})),listen("click",".category_id",(function(){var e=$(this).attr("data-id");$(".category_id").each((function(){$(this).removeClass("active"),$(this).attr("data-id")==e&&$(this).addClass("active")})),window.livewire.emit("changeFilter","eventCategory",e)})),listen("click",".bookSeatBtn",(function(){var e=$(this).attr("data-id");$("#eventId").val(e),$("#bookSeatForm")[0].reset(),$("#bookSeatModal").appendTo("body").modal("show")})),listen("submit","#bookSeatForm",(function(e){e.preventDefault();var t=$("#availableSeat").text();$.ajax({url:route("landing.event.book-seat"),type:"post",data:$(this).serialize(),success:function(e){e.success&&(iziToast.success({title:"Success",message:e.message,position:"topRight"}),$("#availableSeat").text(t-1),$("#bookSeatModalShow").modal("toggle"),$("#bookSeatForm")[0].reset())},error:function(e){iziToast.error({title:"Error",message:e.responseJSON.message,position:"topRight"}),$("#bookSeatForm")[0].reset()}})})),$(document).ready((function(){var e,t=$("#campaignEndDate").val(),a=new Date(t);a.setHours(24),a.setMinutes(0);var o,n,s,i=new Date;e=parseInt((a.getTime()-i.getTime())/1e3),o=Math.floor(e/86400),e-=3600*o*24,n=Math.floor(e/3600),e-=3600*n,s=Math.floor(e/60),e-=60*s;var r=function(e){return e<10?"0".concat(e):e};$("#seconds").text(r(e)),$("#minutes").text(r(s)),$("#hours").text(r(n)),$("#days").text(r(o));var l=setInterval((function(){e-=1,$("#seconds").text(r(e)),0===e&&s>0&&(e=60,s-=1,$("#minutes").text(r(s))),0===e&&0===s&&n>0&&(e=60,s=60,n-=1,$("#hours").text(r(n))),0===e&&0===s&&0===n&&o>0&&(e=60,s=60,n=24,o-=1,$("#days").text(r(o))),0===e&&0===s&&0===n&&0===o&&clearInterval(l)}),1e3)}))},6372:()=>{"use strict";document.addEventListener("turbo:load",(function(){$('[data-toggle="tooltip"]').tooltip()}))},3006:()=>{"use strict";document.addEventListener("DOMContentLoaded",(function(){for(var e,t=document.querySelectorAll(".img-timg"),a=document.querySelector(".modal"),o=document.querySelector(".modal-content"),n=document.querySelector(".close"),s=document.querySelector(".previous"),i=document.querySelector(".next"),r=(document.querySelector(".caption"),function(){a.style.display="none"}),l=function(){e>t.length-1&&(e=0),e<0&&(e=t.length-1),o.src=t[e].src,o.alt=t[e].alt},c=function(o){t[o].addEventListener("click",(function(){e=o,a.style.display="flex",l()}))},d=0;d<t.length;d++)c(d);n&&n.addEventListener("click",(function(){return r()}));s&&s.addEventListener("click",(function(){e--,l()}));i&&i.addEventListener("click",(function(){e++,l()}));listenKeyup((function(e){"Escape"===e.key&&r()})),listenKeyup((function(t){"ArrowRight"===t.key&&(e++,l())})),listenKeyup((function(t){"ArrowRight"===t.key&&(e++,l())}))})),listenClick(".copy-link",(function(){var e=$("<input>");$("body").append(e),e.val($(this).attr("data-link")).select(),document.execCommand("copy"),e.remove(),iziToast.success({title:"Success",message:"Link Copied.",position:"topRight"})}))},8113:function(){"use strict";var e=this;document.addEventListener("DOMContentLoaded",(function(){$("#campaignDonationForm").length&&$("#amount").trigger("keyup");$(" .owl_1").owlCarousel({loop:!1,margin:2,responsiveClass:!0,autoplayHoverPause:!0,autoplay:!1,slideSpeed:400,paginationSpeed:400,autoplayTimeout:3e3,responsive:{0:{items:1,nav:!0,loop:!1},375:{items:2,nav:!0,loop:!1},600:{items:3,nav:!0,loop:!1},1e3:{items:4,nav:!0,loop:!1}}}),$(document).ready((function(){var e=$(".owl-item li ");$(".owl-item li").on("click",(function(){e.removeClass("active")}))}));var e=$("#dueDate").val();if(void 0!==e){var t=function(){var e=(new Date).getTime(),t=i-e,l=6e4,c=36e5,d=864e5,m=function(e){return e<10?"0".concat(e):e};if(i<e)clearInterval(r),document.querySelector(".countdown").innerHTML="<h1>Countdown Has Expired</h1>";else{var u=Math.floor(t/d),p=Math.floor(t%d/c),v=Math.floor(t%c/l),g=Math.floor(t%l/1e3);a.textContent=m(u),o.textContent=m(p),n.textContent=m(v),s.textContent=m(g)}};(e=new Date(e)).setHours(e.getHours()+24);var a=document.getElementById("day-box"),o=document.getElementById("hr-box"),n=document.getElementById("min-box"),s=document.getElementById("sec-box"),i=new Date(moment(e).year(),moment(e).month(),moment(e).date(),moment(e).hours(),moment(e).minutes(),moment(e).seconds()).getTime(),r=setInterval(t,1e3);t()}})),$.ajaxSetup({headers:{"X-CSRF-Token":$('meta[name="csrf-token"]').attr("content")}}),listen("click",".campaign_category_id",(function(e){var t=$(e.currentTarget).attr("data-id");$(".campaign_category_id").each((function(){$(this).removeClass("active"),$(this).attr("data-id")==t&&$(this).addClass("active")})),window.livewire.emit("changeFilter","campaignCategoryId",t)})),listen("click",".currency",(function(){$("#amount").val($(this).text()),$("#yourAmount").text($(this).text())})),listen("keyup","#amount",(function(){var e=$("#amount").val();$("#yourAmount").text(e),$(".prefilled-amount").removeClass("text-danger"),document.querySelectorAll(".prefilled-amount").forEach((function(t){t.innerHTML===e&&t.classList.add("text-danger")}));var t=calculateTotalAmount(e);$(".showTotalAmount").text(t||0),$(".charge_element").removeClass("d-none"),0!=$("#chargeAmtID").text()&&0!=e||$(".charge_element").addClass("d-none")})),listen("change","input[name='payment_method']",(function(){var e=$(this).val();1==e&&($(".stripePayment").removeClass("d-none"),$(".paypalPayment").addClass("d-none")),2==e&&($(".paypalPayment").removeClass("d-none"),$(".stripePayment").addClass("d-none"))})),listen("click",".paymentByStripe",(function(){var e,a=route("campaign.stripe-payment"),o=$("#campaignId").val(),n=$("#currencyCode").val(),s=$("#firstName").val(),i=$("#lastName").val(),r=$("#email").val(),l=$("#amount").val(),c=$("#donationAsGiftId").val();e=$("#donateAnonymously").is(":checked")?1:0;var d={amount:parseFloat(l),currency_code:n,campaign_id:o,first_name:s,last_name:i,email:r,donate_anonymously:e,gift_id:c};return 0===l.trim().length?(iziToast.error({title:"Error",message:"The amount field is required",position:"topRight"}),!1):"0"===l?(iziToast.error({title:"Error",message:"The amount is required greater than zero",position:"topRight"}),!1):l<30&&"inr"===n?(iziToast.error({title:"Error",message:"The amount is required greater than or equal to thirty for indian currency.",position:"topRight"}),!1):0===s.trim().length?(iziToast.error({title:"Error",message:"The first name field is required",position:"topRight"}),!1):0===i.trim().length?(iziToast.error({title:"Error",message:"The last name field is required",position:"topRight"}),!1):r.trim().length>0&&!/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(r)?(iziToast.error({title:"Error",message:"Email field must be a valid email address",position:"topRight"}),!1):($(this).addClass("disabled"),$(".donate-btn").text("Please Wait..."),void t(a,d))}));var t=function(t,a){var o=$("#stripeKey").val(),n=Stripe(o);$.post(t,a).done((function(e){var t=e.data.sessionId;n.redirectToCheckout({sessionId:t}).then((function(e){$(this).addClass("disabled"),$(".donate-btn").text("Please Wait...")}))})).catch((function(t){$(e).addClass("disabled"),$(".donate-btn").text("Please Wait...")}))};listen("click",".paymentByCard",(function(){var e=route("user.membership.pay.stripe"),t={campaign_id:$("#campaignId").val(),user_id:$("#userId").val()};$(this).addClass("disabled"),$(".donate-btn").text("Please Wait..."),a(e,t)}));var a=function(t,a){var o=$("#stripeKey").val(),n=Stripe(o);$.post(t,a).done((function(e){var t=e.data.sessionId;n.redirectToCheckout({sessionId:t}).then((function(e){$(this).addClass("disabled"),$(".donate-btn").text("Please Wait...")}))})).catch((function(t){$(e).addClass("disabled"),$(".donate-btn").text("Please Wait...")}))};listen("click",".paymentByPaypal",(function(){var e,t=$("#campaignId").val(),a=$("#firstName").val(),o=$("#lastName").val(),n=$("#email").val(),s=($("#currencyCode").val(),$("#amount").val()),i=$("#donationAsGiftId").val();return e=$("#donateAnonymously").is(":checked")?1:0,0===s.trim().length?(iziToast.error({title:"Error",message:"The amount field is required",position:"topRight"}),!1):"0"===s?(iziToast.error({title:"Error",message:"The amount is required greater than zero",position:"topRight"}),!1):0===a.trim().length?(iziToast.error({title:"Error",message:"The first name field is required",position:"topRight"}),!1):0===o.trim().length?(iziToast.error({title:"Error",message:"The last name field is required",position:"topRight"}),!1):($(this).addClass("disabled"),$(".donate-btn").text("Please Wait..."),void $.ajax({type:"GET",url:route("paypal.init"),data:{amount:parseFloat($("#amount").val()),currency_code:$("#currencyCode").val(),campaign_id:t,first_name:a,last_name:o,email:n,donate_anonymously:e,gift_id:i},success:function(e){if(e.url&&(window.location.href=e.url),201===e.statusCode){var t="";$.each(e.result.links,(function(e,a){"approve"==a.rel&&(t=a.href)})),location.href=t}},error:function(e){iziToast.error({title:"Error",message:e.responseJSON.message,position:"topRight"}),$(".paymentByPaypal").removeClass("disabled").text("Donate Now")},complete:function(){}}))})),listen("click",".prefilled-amount",(function(){$(".prefilled-amount").removeClass("amount-selected"),$(".prefilled-amount").removeClass("text-danger"),$(this).addClass("amount-selected"),$(this).addClass("text-danger")})),$(document).on("click",".prefilled-amount",(function(){var e=$(this).text(),t=calculateTotalAmount(e);$(".showTotalAmount").text(t||0)})),window.calculateTotalAmount=function(e){var t=$("#typeOfCommission").val(),a=$("#donationCommission").val(),o=e;if(a>0)if(2==t){var n=parseFloat(e)*parseFloat(a)/100;o=parseFloat(e)+n,$("#chargeAmtID").text(n||0)}else{var s=parseFloat(a);o=parseFloat(e)+s,$("#chargeAmtID").text(s||0)}return o||0}},4433:()=>{document.addEventListener("DOMContentLoaded",(function(){$(".counter").each((function(){var e=$(this),t=e.attr("data-countto");countDuration=parseInt(e.attr("data-duration")),$({counter:e.text()}).animate({counter:t},{duration:countDuration,easing:"linear",step:function(){e.text(Math.floor(this.counter))},complete:function(){e.text(this.counter)}})})),$(".slick-slider").slick({dots:!1,arrows:!1,autoplay:!0,autoplayspeed:1600,centerPadding:"0",slidesToShow:5,slidesToScroll:1,responsive:[{breakpoint:1199,settings:{slidesToShow:4}},{breakpoint:992,settings:{slidesToShow:3}},{breakpoint:768,settings:{slidesToShow:2}},{breakpoint:480,settings:{slidesToShow:1}}]}),$(".set > a").on("click",(function(){$(this).hasClass("active")?($(this).removeClass("active"),$(this).siblings(".content").slideUp(200),$(".set > a i").removeClass("fa-minus").addClass("fa-plus")):($(".set > a i").removeClass("fa-minus").addClass("fa-plus"),$(this).find("i").removeClass("fa-plus").addClass("fa-minus"),$(".set > a").removeClass("active"),$(this).addClass("active"),$(".content").slideUp(200),$(this).siblings(".content").slideDown(200))}))})),listen("click",".slider-popup-video",(function(){var e=$(this).attr("data-src");$(".home-page-video").attr("src",e),$("#homePageVideoModal").modal("show")})),listen("hidden.bs.modal","#homePageVideoModal",(function(){$(".home-page-video").attr("src","")})),listen("hidden.bs.modal","#exampleModal4",(function(){$("#exampleModal4 iframe").attr("src",$("#exampleModal4 iframe").attr("src"))}))},9042:()=>{"use strict";listen("click",".news-category-filter",(function(e){$(".news-right-section .categories-section .categories span").css("color","#757e81");var t=$(e.currentTarget).data("id");$(".news-category-filter").removeClass("active"),$(".news-tags-filter").removeClass("active"),$(e.currentTarget).find("span").css("color","#009e74"),$(e.currentTarget).addClass("active"),window.livewire.emit("changeFilter","newsCategory",t)})),listen("click",".news-tags-filter",(function(e){var t=$(e.currentTarget).data("id");$(".news-tags-filter").removeClass("active"),$(".news-category-filter").removeClass("active"),$(e.currentTarget).addClass("active"),window.livewire.emit("changeFilter","newsTags",t)}))},4053:()=>{"use strict";document.addEventListener("DOMContentLoaded",(function(){0==$(".post-comment").length?$(".comment-section").addClass("d-none"):$(".comment-section").removeClass("d-none")})),listen("submit","#newsCommentsForm",(function(e){e.preventDefault();var t=$("#websiteName").val(),a=new RegExp(/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|](\.)+[-a-z]/i);if(!(""==t||!!t.match(a)))return iziToast.error({title:"Error",message:"Please enter a valid website name.",position:"topRight"}),!1;$.ajax({url:route("landing.news-comments"),type:"post",dataType:"json",data:new FormData(this),cache:!1,contentType:!1,processData:!1,success:function(e){if(e.success){iziToast.success({title:"Success",message:e.message,position:"topRight"});var t=e.data.commentCount,a=e.data.newsComment;$("#newsCommentsForm")[0].reset(),$("#commentCount").html(t+" Comments"),$("#commentCounts").html(t+" Comments"),$(".comment-box").prepend('     \n                              <div class="media d-flex mt-40 mb-40">\n                                        <div class="media-img me-sm-4 me-3 rounded-10">\n                                            <img src="'.concat(null==a.user_id?userDefaultImage:a.users.profile_image,'" class="w-100 h-100 rounded-10" alt="comment-image">                          \n                                        </div>\n                                        <div class="media-body w-100">\n                                            <div class="media-title d-flex flex-wrap justify-content-between ">\n                                                <div class="d-flex align-items-center flex-wrap  mb-2">\n                                                    <h5 class="mt-sm-0 mt-2 mb-0  text-black fs-18 fw-5 me-3 pe-sm-1">').concat(a.name,'</h5>\n                                                    <span class="text-gray fs-14 me-4 mt-sm-0 mt-2">\n                                                        <span class="text-gray me-3 pe-sm-1">|</span> ').concat(moment(a.created_at,"YYYY-MM-DD hh:mm:ss").format("Do MMM, YYYY"),'</span>\n                                                </div>\n\x3c!--                                                <button class="reply-btn fs-18 fw-5 text-primary bg-white border-0  mb-2">--\x3e\n\x3c!--                                                    <i class="fa-solid fa-reply me-2"></i>Reply--\x3e\n\x3c!--                                                </button>--\x3e\n                                            </div>\n                                            <p class="fs-16 fw-5 text-gray mb-0">\n                                                ').concat(a.comments,"\n                                            </p>\n                                        </div>\n                                    </div>")),0==t?$(".comment-section").addClass("d-none"):$(".comment-section").removeClass("d-none")}},error:function(e){iziToast.error({title:"Error",message:e.responseJSON.message,position:"topRight"})}})})),listen("keyup","#searchNews",(function(){var e=$(this).val();window.livewire.emit("changeFilter","searchByNewsNameDesc",e)})),listenClick("#resetNewsFilter",(function(){if($(document).find("#searchNews").val()){var e=$(this).val();$("#searchNews").val("").trigger("change"),window.livewire.emit("changeFilter","searchByNewsNameDesc",e)}}))}};e[3147](),e[9042](),e[4433](),e[705](),e[8113](),e[3006](),e[6372](),e[901](),e[9418](),e[3819](),e[4053]()})();