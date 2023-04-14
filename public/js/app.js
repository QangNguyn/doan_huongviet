/******/ (() => { // webpackBootstrap
/******/ 	var __webpack_modules__ = ({

/***/ "./resources/js/app.js":
/*!*****************************!*\
  !*** ./resources/js/app.js ***!
  \*****************************/
/***/ (() => {

function _typeof(obj) { "@babel/helpers - typeof"; return _typeof = "function" == typeof Symbol && "symbol" == typeof Symbol.iterator ? function (obj) { return typeof obj; } : function (obj) { return obj && "function" == typeof Symbol && obj.constructor === Symbol && obj !== Symbol.prototype ? "symbol" : typeof obj; }, _typeof(obj); }
function _defineProperty(obj, key, value) { key = _toPropertyKey(key); if (key in obj) { Object.defineProperty(obj, key, { value: value, enumerable: true, configurable: true, writable: true }); } else { obj[key] = value; } return obj; }
function _toPropertyKey(arg) { var key = _toPrimitive(arg, "string"); return _typeof(key) === "symbol" ? key : String(key); }
function _toPrimitive(input, hint) { if (_typeof(input) !== "object" || input === null) return input; var prim = input[Symbol.toPrimitive]; if (prim !== undefined) { var res = prim.call(input, hint || "default"); if (_typeof(res) !== "object") return res; throw new TypeError("@@toPrimitive must return a primitive value."); } return (hint === "string" ? String : Number)(input); }
$(document).ready(function () {
  if ($(".home-slider").length) {
    var _$$owlCarousel;
    $(".home-slider").owlCarousel((_$$owlCarousel = {
      loop: true,
      nav: true,
      items: 1,
      autoplay: true,
      autoplayTimeout: 3000,
      autoplayHoverPause: true
    }, _defineProperty(_$$owlCarousel, "nav", false), _defineProperty(_$$owlCarousel, "dots", false), _$$owlCarousel));
  }
  if ($("#news__slider").length) {
    $("#news__slider").owlCarousel({
      loop: true,
      items: 3,
      margin: 30,
      autoplay: true,
      autoplayTimeout: 3000,
      autoplayHoverPause: true,
      dots: false,
      nav: true
    });
  }
  if ($(".related-product__slider").length) {
    $(".related-product__slider").owlCarousel({
      loop: true,
      items: 4,
      margin: 20,
      autoplay: true,
      autoplayTimeout: 3000,
      autoplayHoverPause: true,
      dots: false,
      nav: true
    });
  }
});
if ($(".home-slider").length) {
  $(".home-slider").on("changed.owl.carousel", function () {
    var sliderItem = document.querySelectorAll(".home-slider .owl-item");
    sliderItem.forEach(function (item) {
      if (!item.classList.contains("active")) {
        item.childNodes[0].querySelector(".banner__content h2").classList.add("animate__animated", "animate__bounceInDown", "animate__slow");
        item.childNodes[0].querySelector(".banner__content .content__text p:nth-child(1)").classList.add("animate__animated", "animate__fadeInLeft", "animate__slow");
        item.childNodes[0].querySelector(".banner__content .content__text p:nth-child(2)").classList.add("animate__animated", "animate__fadeInLeft", "animate__slow");
        item.childNodes[0].querySelector(".banner__content .content__text p:nth-child(3)").classList.add("animate__animated", "animate__zoomInDown", "animate__slow");
      } else {
        item.childNodes[0].querySelector(".banner__content h2").classList.remove("animate__animated", "animate__bounceInDown", "animate__slow");
        item.childNodes[0].querySelector(".banner__content .content__text p:nth-child(1)").classList.remove("animate__animated", "animate__fadeInLeft", "animate__slow");
        item.childNodes[0].querySelector(".banner__content .content__text p:nth-child(2)").classList.remove("animate__animated", "animate__fadeInLeft", "animate__slow");
        item.childNodes[0].querySelector(".banner__content .content__text p:nth-child(3)").classList.remove("animate__animated", "animate__zoomInDown", "animate__slow");
      }
    });
  });
}
var rangeInput = document.querySelectorAll(".filter-form__form--range-price input");
var rangeText = document.querySelectorAll(".range-price__text div");
var progress = document.querySelector(".range-price__progress");
if (rangeInput && rangeText && progress) {
  var priceMax = rangeInput[0].max;
  var priceGap = 3000000;
  rangeInput.forEach(function (input) {
    input.addEventListener("input", function (event) {
      var minVal = parseInt(rangeInput[0].value);
      var maxVal = parseInt(rangeInput[1].value);
      if (maxVal - minVal < priceGap) {
        if (event.target.className === "min-range") {
          minVal = rangeInput[0].value = maxVal - priceGap;
        } else {
          maxVal = rangeInput[1].value = minVal + priceGap;
        }
      }
      var positionMin = minVal / priceMax * 100;
      var positionMax = 100 - maxVal / priceMax * 100;
      progress.style.left = positionMin + "%";
      progress.style.right = positionMax + "%";
      rangeText[0].innerText = minVal.toLocaleString();
      rangeText[1].innerText = maxVal.toLocaleString();
    });
  });
}
$(document).ready(function () {
  var sync1 = $("#sync1");
  var sync2 = $("#sync2");
  if (sync1.length && sync2.length) {
    var syncPosition = function syncPosition(el) {
      //if you set loop to false, you have to restore this next line
      //var current = el.item.index;

      //if you disable loop you have to comment this block
      var count = el.item.count - 1;
      var current = Math.round(el.item.index - el.item.count / 2 - 0.5);
      if (current < 0) {
        current = count;
      }
      if (current > count) {
        current = 0;
      }

      //end block

      sync2.find(".owl-item").removeClass("current").eq(current).addClass("current");
      var onscreen = sync2.find(".owl-item.active").length - 1;
      var start = sync2.find(".owl-item.active").first().index();
      var end = sync2.find(".owl-item.active").last().index();
      if (current > end) {
        sync2.data("owl.carousel").to(current, 100, true);
      }
      if (current < start) {
        sync2.data("owl.carousel").to(current - onscreen, 100, true);
      }
    };
    var syncPosition2 = function syncPosition2(el) {
      if (syncedSecondary) {
        var number = el.item.index;
        sync1.data("owl.carousel").to(number, 100, true);
      }
    };
    var slidesPerPage = 4; //globaly define number of elements per page
    var syncedSecondary = true;
    sync1.owlCarousel({
      items: 1,
      slideSpeed: 2000,
      nav: false,
      autoplay: true,
      dots: false,
      loop: true,
      autoplayHoverPause: true,
      responsiveRefreshRate: 200
    }).on("changed.owl.carousel", syncPosition);
    sync2.on("initialized.owl.carousel", function () {
      sync2.find(".owl-item").eq(0).addClass("current");
    }).owlCarousel({
      items: slidesPerPage,
      dots: false,
      autoplayHoverPause: true,
      nav: false,
      smartSpeed: 200,
      slideSpeed: 500,
      slideBy: slidesPerPage,
      //alternatively you can slide by 1, this way the active slide will stick to the first item in the second carousel
      responsiveRefreshRate: 100
    }).on("changed.owl.carousel", syncPosition2);
    sync2.on("click", ".owl-item", function (e) {
      e.preventDefault();
      var number = $(this).index();
      sync1.data("owl.carousel").to(number, 300, true);
    });
  }
});
$(document).ready(function () {
  $(".addToCartButton").click(function (e) {
    e.preventDefault();
    var product_id = $(this).attr("data-id");
    var product_qty = $(this).prev().val();
    $.ajaxSetup({
      headers: {
        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
      }
    });
    $.ajax({
      method: "POST",
      url: "/add-to-cart",
      data: {
        product_id: product_id,
        product_qty: product_qty
      },
      success: function success(response) {
        // console.log(response.status)
        Swal.fire({
          icon: "success",
          title: "Xong!",
          text: response.status,
          confirmButtonText: "Đồng ý",
          confirmButtonColor: "#2661ec"
        }).then(function (result) {
          $(".cart-count").text(response.count);
        });
      }
    });
  });
});
$(document).ready(function () {
  $("#update-cart-btn").click(function (e) {
    e.preventDefault();

    // Lấy thông tin về sản phẩm từ các input trong bảng
    var products = [];
    $("table tbody tr").each(function () {
      var rowId = $(this).find(".deleteCartItem").data("id");
      var qty = $(this).find(".cart-table--quality input").val();
      products.push({
        rowId: rowId,
        qty: qty
      });
    });
    console.log(products);
    // Gửi Ajax để cập nhật giỏ hàng

    $.ajaxSetup({
      headers: {
        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
      }
    });
    $.ajax({
      type: "POST",
      url: "update-cart",
      data: {
        products: products
      },
      success: function success(response) {
        if (response.status == "success") {
          Swal.fire({
            icon: "success",
            title: "Xong!",
            text: "Cập nhật giỏ hàng thành công",
            confirmButtonText: "Đồng ý!",
            confirmButtonColor: "#2661ec"
          }).then(function (result) {
            /* Read more about isConfirmed, isDenied below */
            location.reload();
          });
        }
      }
    });
  });
  $(".deleteCartItem").click(function (e) {
    e.preventDefault();
    $.ajaxSetup({
      headers: {
        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
      }
    });
    var rowId = $(this).attr("data-id");
    console.log(rowId);
    $.ajax({
      method: "POST",
      url: "delete-cart-item",
      data: {
        rowId: rowId
      },
      success: function success(response) {
        Swal.fire({
          icon: "success",
          title: "Xong!",
          text: response.status,
          confirmButtonText: "Đồng ý!",
          confirmButtonColor: "#2661ec"
        }).then(function (result) {
          location.reload();
        });
      }
    });
  });
});

/***/ }),

/***/ "./resources/sass/app.scss":
/*!*********************************!*\
  !*** ./resources/sass/app.scss ***!
  \*********************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
// extracted by mini-css-extract-plugin


/***/ }),

/***/ "./resources/sass/admin.scss":
/*!***********************************!*\
  !*** ./resources/sass/admin.scss ***!
  \***********************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
// extracted by mini-css-extract-plugin


/***/ })

/******/ 	});
/************************************************************************/
/******/ 	// The module cache
/******/ 	var __webpack_module_cache__ = {};
/******/ 	
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/ 		// Check if module is in cache
/******/ 		var cachedModule = __webpack_module_cache__[moduleId];
/******/ 		if (cachedModule !== undefined) {
/******/ 			return cachedModule.exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = __webpack_module_cache__[moduleId] = {
/******/ 			// no module.id needed
/******/ 			// no module.loaded needed
/******/ 			exports: {}
/******/ 		};
/******/ 	
/******/ 		// Execute the module function
/******/ 		__webpack_modules__[moduleId](module, module.exports, __webpack_require__);
/******/ 	
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/ 	
/******/ 	// expose the modules object (__webpack_modules__)
/******/ 	__webpack_require__.m = __webpack_modules__;
/******/ 	
/************************************************************************/
/******/ 	/* webpack/runtime/chunk loaded */
/******/ 	(() => {
/******/ 		var deferred = [];
/******/ 		__webpack_require__.O = (result, chunkIds, fn, priority) => {
/******/ 			if(chunkIds) {
/******/ 				priority = priority || 0;
/******/ 				for(var i = deferred.length; i > 0 && deferred[i - 1][2] > priority; i--) deferred[i] = deferred[i - 1];
/******/ 				deferred[i] = [chunkIds, fn, priority];
/******/ 				return;
/******/ 			}
/******/ 			var notFulfilled = Infinity;
/******/ 			for (var i = 0; i < deferred.length; i++) {
/******/ 				var [chunkIds, fn, priority] = deferred[i];
/******/ 				var fulfilled = true;
/******/ 				for (var j = 0; j < chunkIds.length; j++) {
/******/ 					if ((priority & 1 === 0 || notFulfilled >= priority) && Object.keys(__webpack_require__.O).every((key) => (__webpack_require__.O[key](chunkIds[j])))) {
/******/ 						chunkIds.splice(j--, 1);
/******/ 					} else {
/******/ 						fulfilled = false;
/******/ 						if(priority < notFulfilled) notFulfilled = priority;
/******/ 					}
/******/ 				}
/******/ 				if(fulfilled) {
/******/ 					deferred.splice(i--, 1)
/******/ 					var r = fn();
/******/ 					if (r !== undefined) result = r;
/******/ 				}
/******/ 			}
/******/ 			return result;
/******/ 		};
/******/ 	})();
/******/ 	
/******/ 	/* webpack/runtime/hasOwnProperty shorthand */
/******/ 	(() => {
/******/ 		__webpack_require__.o = (obj, prop) => (Object.prototype.hasOwnProperty.call(obj, prop))
/******/ 	})();
/******/ 	
/******/ 	/* webpack/runtime/make namespace object */
/******/ 	(() => {
/******/ 		// define __esModule on exports
/******/ 		__webpack_require__.r = (exports) => {
/******/ 			if(typeof Symbol !== 'undefined' && Symbol.toStringTag) {
/******/ 				Object.defineProperty(exports, Symbol.toStringTag, { value: 'Module' });
/******/ 			}
/******/ 			Object.defineProperty(exports, '__esModule', { value: true });
/******/ 		};
/******/ 	})();
/******/ 	
/******/ 	/* webpack/runtime/jsonp chunk loading */
/******/ 	(() => {
/******/ 		// no baseURI
/******/ 		
/******/ 		// object to store loaded and loading chunks
/******/ 		// undefined = chunk not loaded, null = chunk preloaded/prefetched
/******/ 		// [resolve, reject, Promise] = chunk loading, 0 = chunk loaded
/******/ 		var installedChunks = {
/******/ 			"/js/app": 0,
/******/ 			"css/app": 0,
/******/ 			"css/admin": 0
/******/ 		};
/******/ 		
/******/ 		// no chunk on demand loading
/******/ 		
/******/ 		// no prefetching
/******/ 		
/******/ 		// no preloaded
/******/ 		
/******/ 		// no HMR
/******/ 		
/******/ 		// no HMR manifest
/******/ 		
/******/ 		__webpack_require__.O.j = (chunkId) => (installedChunks[chunkId] === 0);
/******/ 		
/******/ 		// install a JSONP callback for chunk loading
/******/ 		var webpackJsonpCallback = (parentChunkLoadingFunction, data) => {
/******/ 			var [chunkIds, moreModules, runtime] = data;
/******/ 			// add "moreModules" to the modules object,
/******/ 			// then flag all "chunkIds" as loaded and fire callback
/******/ 			var moduleId, chunkId, i = 0;
/******/ 			if(chunkIds.some((id) => (installedChunks[id] !== 0))) {
/******/ 				for(moduleId in moreModules) {
/******/ 					if(__webpack_require__.o(moreModules, moduleId)) {
/******/ 						__webpack_require__.m[moduleId] = moreModules[moduleId];
/******/ 					}
/******/ 				}
/******/ 				if(runtime) var result = runtime(__webpack_require__);
/******/ 			}
/******/ 			if(parentChunkLoadingFunction) parentChunkLoadingFunction(data);
/******/ 			for(;i < chunkIds.length; i++) {
/******/ 				chunkId = chunkIds[i];
/******/ 				if(__webpack_require__.o(installedChunks, chunkId) && installedChunks[chunkId]) {
/******/ 					installedChunks[chunkId][0]();
/******/ 				}
/******/ 				installedChunks[chunkId] = 0;
/******/ 			}
/******/ 			return __webpack_require__.O(result);
/******/ 		}
/******/ 		
/******/ 		var chunkLoadingGlobal = self["webpackChunk"] = self["webpackChunk"] || [];
/******/ 		chunkLoadingGlobal.forEach(webpackJsonpCallback.bind(null, 0));
/******/ 		chunkLoadingGlobal.push = webpackJsonpCallback.bind(null, chunkLoadingGlobal.push.bind(chunkLoadingGlobal));
/******/ 	})();
/******/ 	
/************************************************************************/
/******/ 	
/******/ 	// startup
/******/ 	// Load entry module and return exports
/******/ 	// This entry module depends on other loaded chunks and execution need to be delayed
/******/ 	__webpack_require__.O(undefined, ["css/app","css/admin"], () => (__webpack_require__("./resources/js/app.js")))
/******/ 	__webpack_require__.O(undefined, ["css/app","css/admin"], () => (__webpack_require__("./resources/sass/app.scss")))
/******/ 	var __webpack_exports__ = __webpack_require__.O(undefined, ["css/app","css/admin"], () => (__webpack_require__("./resources/sass/admin.scss")))
/******/ 	__webpack_exports__ = __webpack_require__.O(__webpack_exports__);
/******/ 	
/******/ })()
;