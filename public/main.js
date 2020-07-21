/******/ (function(modules) { // webpackBootstrap
/******/ 	// The module cache
/******/ 	var installedModules = {};
/******/
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/
/******/ 		// Check if module is in cache
/******/ 		if(installedModules[moduleId]) {
/******/ 			return installedModules[moduleId].exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = installedModules[moduleId] = {
/******/ 			i: moduleId,
/******/ 			l: false,
/******/ 			exports: {}
/******/ 		};
/******/
/******/ 		// Execute the module function
/******/ 		modules[moduleId].call(module.exports, module, module.exports, __webpack_require__);
/******/
/******/ 		// Flag the module as loaded
/******/ 		module.l = true;
/******/
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/
/******/
/******/ 	// expose the modules object (__webpack_modules__)
/******/ 	__webpack_require__.m = modules;
/******/
/******/ 	// expose the module cache
/******/ 	__webpack_require__.c = installedModules;
/******/
/******/ 	// define getter function for harmony exports
/******/ 	__webpack_require__.d = function(exports, name, getter) {
/******/ 		if(!__webpack_require__.o(exports, name)) {
/******/ 			Object.defineProperty(exports, name, { enumerable: true, get: getter });
/******/ 		}
/******/ 	};
/******/
/******/ 	// define __esModule on exports
/******/ 	__webpack_require__.r = function(exports) {
/******/ 		if(typeof Symbol !== 'undefined' && Symbol.toStringTag) {
/******/ 			Object.defineProperty(exports, Symbol.toStringTag, { value: 'Module' });
/******/ 		}
/******/ 		Object.defineProperty(exports, '__esModule', { value: true });
/******/ 	};
/******/
/******/ 	// create a fake namespace object
/******/ 	// mode & 1: value is a module id, require it
/******/ 	// mode & 2: merge all properties of value into the ns
/******/ 	// mode & 4: return value when already ns object
/******/ 	// mode & 8|1: behave like require
/******/ 	__webpack_require__.t = function(value, mode) {
/******/ 		if(mode & 1) value = __webpack_require__(value);
/******/ 		if(mode & 8) return value;
/******/ 		if((mode & 4) && typeof value === 'object' && value && value.__esModule) return value;
/******/ 		var ns = Object.create(null);
/******/ 		__webpack_require__.r(ns);
/******/ 		Object.defineProperty(ns, 'default', { enumerable: true, value: value });
/******/ 		if(mode & 2 && typeof value != 'string') for(var key in value) __webpack_require__.d(ns, key, function(key) { return value[key]; }.bind(null, key));
/******/ 		return ns;
/******/ 	};
/******/
/******/ 	// getDefaultExport function for compatibility with non-harmony modules
/******/ 	__webpack_require__.n = function(module) {
/******/ 		var getter = module && module.__esModule ?
/******/ 			function getDefault() { return module['default']; } :
/******/ 			function getModuleExports() { return module; };
/******/ 		__webpack_require__.d(getter, 'a', getter);
/******/ 		return getter;
/******/ 	};
/******/
/******/ 	// Object.prototype.hasOwnProperty.call
/******/ 	__webpack_require__.o = function(object, property) { return Object.prototype.hasOwnProperty.call(object, property); };
/******/
/******/ 	// __webpack_public_path__
/******/ 	__webpack_require__.p = "/";
/******/
/******/
/******/ 	// Load entry module and return exports
/******/ 	return __webpack_require__(__webpack_require__.s = 1);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./resources/js/main.js":
/*!******************************!*\
  !*** ./resources/js/main.js ***!
  \******************************/
/*! no static exports found */
/***/ (function(module, exports) {

window.onload = function () {
  var date = new Date();
  var yyyy = date.getFullYear();
  var mm = ("00" + (date.getMonth() + 1)).slice(-2);
  var dd = ("00" + date.getDate()).slice(-2);
  console.log(yyyy);
  console.log(mm);
  console.log(dd);
  var todayData = yyyy + "-" + mm + "-" + dd;
  document.getElementById("today").value = todayData;
  var date1 = document.getElementById("kikan1").value;
  var date2 = document.getElementById("kikan2").value;
  var date3 = document.getElementById("nissu").value;
};

var btn = document.getElementById('sumMoney');
btn.addEventListener("click", function () {
  var date0 = "";
  var date1 = document.getElementById("kikan1").value;
  var date2 = document.getElementById("kikan2").value;
  console.log(date2);

  if (date1 !== "" && date2 !== "") {
    var d1 = new Date(date1);
    var d2 = new Date(date2);
    var d3 = d2.getTime() - d1.getTime();
    date0 = d3 / (60 * 60 * 24 * 1000);
  }

  console.log(date0);
  document.getElementById("nissu").value = date0;
  var nittoInput = document.getElementById("nitto").value;
  nittoInput = nittoInput.replace(/,/g, '');
  console.log(nittoInput);
  nittoInput = parseInt(nittoInput);
  console.log(nittoInput);
  nittoInput = nittoInput * date0;
  var syukuhakuhiInput = document.getElementById("syukuhaku").value;
  syukuhakuhiInput = syukuhakuhiInput.replace(/,/g, '');
  console.log(syukuhakuhiInput);
  syukuhakuhiInput = parseInt(syukuhakuhiInput);
  console.log(syukuhakuhiInput);
  syukuhakuhiInput = syukuhakuhiInput * (date0 - 1);
  console.log(syukuhakuhiInput);
  document.getElementById("syukuhaku").value = syukuhakuhiInput;
  console.log(syukuhakuhiInput);
  var sum = nittoInput + syukuhakuhiInput;
  document.getElementById("karibarai").value = sum;
  document.getElementById("nissu").value;
}, false);

/***/ }),

/***/ 1:
/*!************************************!*\
  !*** multi ./resources/js/main.js ***!
  \************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(/*! C:\xampp\htdocs\businessTripSystem\resources\js\main.js */"./resources/js/main.js");


/***/ })

/******/ });