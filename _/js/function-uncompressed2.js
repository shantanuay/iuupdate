(function ($) {
    $.extend($.fx.step, {
        backgroundPosition: function (fx) {
            if (fx.state === 0 && typeof fx.end == 'string') {
                var start = $.curCSS(fx.elem, 'backgroundPosition');
                start = toArray(start);
                fx.start = [start[0], start[2]];
                var end = toArray(fx.end);
                fx.end = [end[0], end[2]];
                fx.unit = [end[1], end[3]];
            }
            var nowPosX = [];
            nowPosX[0] = ((fx.end[0] - fx.start[0]) * fx.pos) + fx.start[0] + fx.unit[0];
            nowPosX[1] = ((fx.end[1] - fx.start[1]) * fx.pos) + fx.start[1] + fx.unit[1];
            fx.elem.style.backgroundPosition = nowPosX[0] + ' ' + nowPosX[1];

            function toArray(strg) {
                strg = strg.replace(/left|top/g, '0px');
                strg = strg.replace(/right|bottom/g, '100%');
                strg = strg.replace(/([0-9\.]+)(\s|\)|$)/g, "$1px$2");
                var res = strg.match(/(-?[0-9\.]+)(px|\%|em|pt)\s(-?[0-9\.]+)(px|\%|em|pt)/);
                return [parseFloat(res[1], 10), res[2], parseFloat(res[3], 10), res[4]];
            }
        }
    });
})(jQuery);
if ((navigator.userAgent.match(/iPhone/i)) || (navigator.userAgent.match(/iPod/i)) || (navigator.userAgent.match(/iPad/i)) || (navigator.userAgent.match(/Android/i)) || (navigator.userAgent.match(/webOS/i))) {
    eventbtn = "touchstart";
    eventbtn2 = "touchstart";
} else {
    eventbtn = "click";
    eventbtn2 = "hover";
}

function css_browser_selector(u) {
    var ua = u.toLowerCase(),
        is = function (t) {
            return ua.indexOf(t) > -1
        },
        g = 'gecko',
        w = 'webkit',
        s = 'safari',
        o = 'opera',
        m = 'mobile',
        h = document.documentElement,
        b = [(!(/opera|webtv/i.test(ua)) && /msie\s(\d)/.test(ua)) ? ('ie ie' + RegExp.$1) : is('firefox/2') ? g + ' ff2' : is('firefox/3.5') ? g + ' ff3 ff3_5' : is('firefox/3.6') ? g + ' ff3 ff3_6' : is('firefox/3') ? g + ' ff3' : is('gecko/') ? g : is('opera') ? o + (/version\/(\d+)/.test(ua) ? ' ' + o + RegExp.$1 : (/opera(\s|\/)(\d+)/.test(ua) ? ' ' + o + RegExp.$2 : '')) : is('konqueror') ? 'konqueror' : is('blackberry') ? m + ' blackberry' : is('android') ? m + ' android' : is('chrome') ? w + ' chrome' : is('iron') ? w + ' iron' : is('applewebkit/') ? w + ' ' + s + (/version\/(\d+)/.test(ua) ? ' ' + s + RegExp.$1 : '') : is('mozilla/') ? g : '', is('j2me') ? m + ' j2me' : is('iphone') ? m + ' iphone' : is('ipod') ? m + ' ipod' : is('ipad') ? m + ' ipad' : is('mac') ? 'mac' : is('darwin') ? 'mac' : is('webtv') ? 'webtv' : is('win') ? 'win' + (is('windows nt 6.0') ? ' vista' : '') : is('freebsd') ? 'freebsd' : (is('x11') || is('linux')) ? 'linux' : '', 'js'];
    c = b.join(' ');
    h.className += ' ' + c;
    return c;
};
css_browser_selector(navigator.userAgent);

jQuery.easing['jswing'] = jQuery.easing['swing'];
jQuery.extend(jQuery.easing, {
    def: 'easeOutQuad',
    swing: function (x, t, b, c, d) {
        return jQuery.easing[jQuery.easing.def](x, t, b, c, d);
    },
    easeInQuad: function (x, t, b, c, d) {
        return c * (t /= d) * t + b;
    },
    easeOutQuad: function (x, t, b, c, d) {
        return -c * (t /= d) * (t - 2) + b;
    },
    easeInOutQuad: function (x, t, b, c, d) {
        if ((t /= d / 2) < 1) return c / 2 * t * t + b;
        return -c / 2 * ((--t) * (t - 2) - 1) + b;
    },
    easeInCubic: function (x, t, b, c, d) {
        return c * (t /= d) * t * t + b;
    },
    easeOutCubic: function (x, t, b, c, d) {
        return c * ((t = t / d - 1) * t * t + 1) + b;
    },
    easeInOutCubic: function (x, t, b, c, d) {
        if ((t /= d / 2) < 1) return c / 2 * t * t * t + b;
        return c / 2 * ((t -= 2) * t * t + 2) + b;
    },
    easeInQuart: function (x, t, b, c, d) {
        return c * (t /= d) * t * t * t + b;
    },
    easeOutQuart: function (x, t, b, c, d) {
        return -c * ((t = t / d - 1) * t * t * t - 1) + b;
    },
    easeInOutQuart: function (x, t, b, c, d) {
        if ((t /= d / 2) < 1) return c / 2 * t * t * t * t + b;
        return -c / 2 * ((t -= 2) * t * t * t - 2) + b;
    },
    easeInQuint: function (x, t, b, c, d) {
        return c * (t /= d) * t * t * t * t + b;
    },
    easeOutQuint: function (x, t, b, c, d) {
        return c * ((t = t / d - 1) * t * t * t * t + 1) + b;
    },
    easeInOutQuint: function (x, t, b, c, d) {
        if ((t /= d / 2) < 1) return c / 2 * t * t * t * t * t + b;
        return c / 2 * ((t -= 2) * t * t * t * t + 2) + b;
    },
    easeInSine: function (x, t, b, c, d) {
        return -c * Math.cos(t / d * (Math.PI / 2)) + c + b;
    },
    easeOutSine: function (x, t, b, c, d) {
        return c * Math.sin(t / d * (Math.PI / 2)) + b;
    },
    easeInOutSine: function (x, t, b, c, d) {
        return -c / 2 * (Math.cos(Math.PI * t / d) - 1) + b;
    },
    easeInExpo: function (x, t, b, c, d) {
        return (t == 0) ? b : c * Math.pow(2, 10 * (t / d - 1)) + b;
    },
    easeOutExpo: function (x, t, b, c, d) {
        return (t == d) ? b + c : c * (-Math.pow(2, -10 * t / d) + 1) + b;
    },
    easeInOutExpo: function (x, t, b, c, d) {
        if (t == 0) return b;
        if (t == d) return b + c;
        if ((t /= d / 2) < 1) return c / 2 * Math.pow(2, 10 * (t - 1)) + b;
        return c / 2 * (-Math.pow(2, -10 * --t) + 2) + b;
    },
    easeInCirc: function (x, t, b, c, d) {
        return -c * (Math.sqrt(1 - (t /= d) * t) - 1) + b;
    },
    easeOutCirc: function (x, t, b, c, d) {
        return c * Math.sqrt(1 - (t = t / d - 1) * t) + b;
    },
    easeInOutCirc: function (x, t, b, c, d) {
        if ((t /= d / 2) < 1) return -c / 2 * (Math.sqrt(1 - t * t) - 1) + b;
        return c / 2 * (Math.sqrt(1 - (t -= 2) * t) + 1) + b;
    },
    easeInElastic: function (x, t, b, c, d) {
        var s = 1.70158;
        var p = 0;
        var a = c;
        if (t == 0) return b;
        if ((t /= d) == 1) return b + c;
        if (!p) p = d * .3;
        if (a < Math.abs(c)) {
            a = c;
            var s = p / 4;
        } else var s = p / (2 * Math.PI) * Math.asin(c / a);
        return -(a * Math.pow(2, 10 * (t -= 1)) * Math.sin((t * d - s) * (2 * Math.PI) / p)) + b;
    },
    easeOutElastic: function (x, t, b, c, d) {
        var s = 1.70158;
        var p = 0;
        var a = c;
        if (t == 0) return b;
        if ((t /= d) == 1) return b + c;
        if (!p) p = d * .3;
        if (a < Math.abs(c)) {
            a = c;
            var s = p / 4;
        } else var s = p / (2 * Math.PI) * Math.asin(c / a);
        return a * Math.pow(2, -10 * t) * Math.sin((t * d - s) * (2 * Math.PI) / p) + c + b;
    },
    easeInOutElastic: function (x, t, b, c, d) {
        var s = 1.70158;
        var p = 0;
        var a = c;
        if (t == 0) return b;
        if ((t /= d / 2) == 2) return b + c;
        if (!p) p = d * (.3 * 1.5);
        if (a < Math.abs(c)) {
            a = c;
            var s = p / 4;
        } else var s = p / (2 * Math.PI) * Math.asin(c / a);
        if (t < 1) return -.5 * (a * Math.pow(2, 10 * (t -= 1)) * Math.sin((t * d - s) * (2 * Math.PI) / p)) + b;
        return a * Math.pow(2, -10 * (t -= 1)) * Math.sin((t * d - s) * (2 * Math.PI) / p) * .5 + c + b;
    },
    easeInBack: function (x, t, b, c, d, s) {
        if (s == undefined) s = 1.70158;
        return c * (t /= d) * t * ((s + 1) * t - s) + b;
    },
    easeOutBack: function (x, t, b, c, d, s) {
        if (s == undefined) s = 1.70158;
        return c * ((t = t / d - 1) * t * ((s + 1) * t + s) + 1) + b;
    },
    easeInOutBack: function (x, t, b, c, d, s) {
        if (s == undefined) s = 1.70158;
        if ((t /= d / 2) < 1) return c / 2 * (t * t * (((s *= (1.525)) + 1) * t - s)) + b;
        return c / 2 * ((t -= 2) * t * (((s *= (1.525)) + 1) * t + s) + 2) + b;
    },
    easeInBounce: function (x, t, b, c, d) {
        return c - jQuery.easing.easeOutBounce(x, d - t, 0, c, d) + b;
    },
    easeOutBounce: function (x, t, b, c, d) {
        if ((t /= d) < (1 / 2.75)) {
            return c * (7.5625 * t * t) + b;
        } else if (t < (2 / 2.75)) {
            return c * (7.5625 * (t -= (1.5 / 2.75)) * t + .75) + b;
        } else if (t < (2.5 / 2.75)) {
            return c * (7.5625 * (t -= (2.25 / 2.75)) * t + .9375) + b;
        } else {
            return c * (7.5625 * (t -= (2.625 / 2.75)) * t + .984375) + b;
        }
    },
    easeInOutBounce: function (x, t, b, c, d) {
        if (t < d / 2) return jQuery.easing.easeInBounce(x, t * 2, 0, c, d) * .5 + b;
        return jQuery.easing.easeOutBounce(x, t * 2 - d, 0, c, d) * .5 + c * .5 + b;
    }
});
(function (a) {
    a.fn.slides = function (b) {
        return b = a.extend({}, a.fn.slides.option, b), this.each(function () {
            function w(g, h, i) {
                if (!p && o) {
                    p = !0, b.animationStart(n + 1);
                    switch (g) {
                    case "next":
                        l = n, k = n + 1, k = e === k ? 0 : k, r = f * 2, g = -f * 2, n = k;
                        break;
                    case "prev":
                        l = n, k = n - 1, k = k === -1 ? e - 1 : k, r = 0, g = 0, n = k;
                        break;
                    case "pagination":
                        k = parseInt(i, 10), l = a("." + b.paginationClass + " li." + b.currentClass + " a", c).attr("href").match("[^#/]+$"), k > l ? (r = f * 2, g = -f * 2) : (r = 0, g = 0), n = k
                    }
                    h === "fade" ? b.crossfade ? d.children(":eq(" + k + ")", c).css({
                        zIndex: 10
                    }).fadeIn(b.fadeSpeed, b.fadeEasing, function () {
                        b.autoHeight ? d.animate({
                            height: d.children(":eq(" + k + ")", c).outerHeight()
                        }, b.autoHeightSpeed, function () {
                            d.children(":eq(" + l + ")", c).css({
                                display: "none",
                                zIndex: 0
                            }), d.children(":eq(" + k + ")", c).css({
                                zIndex: 0
                            }), b.animationComplete(k + 1), p = !1
                        }) : (d.children(":eq(" + l + ")", c).css({
                            display: "none",
                            zIndex: 0
                        }), d.children(":eq(" + k + ")", c).css({
                            zIndex: 0
                        }), b.animationComplete(k + 1), p = !1)
                    }) : d.children(":eq(" + l + ")", c).fadeOut(b.fadeSpeed, b.fadeEasing, function () {
                        b.autoHeight ? d.animate({
                            height: d.children(":eq(" + k + ")", c).outerHeight()
                        }, b.autoHeightSpeed, function () {
                            d.children(":eq(" + k + ")", c).fadeIn(b.fadeSpeed, b.fadeEasing)
                        }) : d.children(":eq(" + k + ")", c).fadeIn(b.fadeSpeed, b.fadeEasing, function () {
                            a.browser.msie && a(this).get(0).style.removeAttribute("filter")
                        }), b.animationComplete(k + 1), p = !1
                    }) : (d.children(":eq(" + k + ")").css({
                        left: r,
                        display: "block"
                    }), b.autoHeight ? d.animate({
                        left: g,
                        height: d.children(":eq(" + k + ")").outerHeight()
                    }, b.slideSpeed, b.slideEasing, function () {
                        d.css({
                            left: -f
                        }), d.children(":eq(" + k + ")").css({
                            left: f,
                            zIndex: 5
                        }), d.children(":eq(" + l + ")").css({
                            left: f,
                            display: "none",
                            zIndex: 0
                        }), b.animationComplete(k + 1), p = !1
                    }) : d.animate({
                        left: g
                    }, b.slideSpeed, b.slideEasing, function () {
                        d.css({
                            left: -f
                        }), d.children(":eq(" + k + ")").css({
                            left: f,
                            zIndex: 5
                        }), d.children(":eq(" + l + ")").css({
                            left: f,
                            display: "none",
                            zIndex: 0
                        }), b.animationComplete(k + 1), p = !1
                    })), b.pagination && (a("." + b.paginationClass + " li." + b.currentClass, c).removeClass(b.currentClass), a("." + b.paginationClass + " li:eq(" + k + ")", c).addClass(b.currentClass))
                }
            }
            function x() {
                clearInterval(c.data("interval"))
            }
            function y() {
                b.pause ? (clearTimeout(c.data("pause")), clearInterval(c.data("interval")), u = setTimeout(function () {
                    clearTimeout(c.data("pause")), v = setInterval(function () {
                        w("next", i)
                    }, b.play), c.data("interval", v)
                }, b.pause), c.data("pause", u)) : x()
            }
            a("." + b.container, a(this)).children().wrapAll('<div class="slides_control"/>');
            var c = a(this),
                d = a(".slides_control", c),
                e = d.children().size(),
                f = d.children().outerWidth(),
                g = d.children().outerHeight(),
                h = b.start - 1,
                i = b.effect.indexOf(",") < 0 ? b.effect : b.effect.replace(" ", "").split(",")[0],
                j = b.effect.indexOf(",") < 0 ? i : b.effect.replace(" ", "").split(",")[1],
                k = 0,
                l = 0,
                m = 0,
                n = 0,
                o, p, q, r, s, t, u, v;
            if (e < 2) return a("." + b.container, a(this)).fadeIn(b.fadeSpeed, b.fadeEasing, function () {
                o = !0, b.slidesLoaded()
            }), a("." + b.next + ", ." + b.prev).fadeOut(0), !1;
            if (e < 2) return;
            h < 0 && (h = 0), h > e && (h = e - 1), b.start && (n = h), b.randomize && d.randomize(), a("." + b.container, c).css({
                overflow: "hidden",
                position: "relative"
            }), d.children().css({
                position: "absolute",
                top: 0,
                left: d.children().outerWidth(),
                zIndex: 0,
                display: "none"
            }), d.css({
                position: "relative",
                width: f * 3,
                height: g,
                left: -f
            }), a("." + b.container, c).css({
                display: "block"
            }), b.autoHeight && (d.children().css({
                height: "auto"
            }), d.animate({
                height: d.children(":eq(" + h + ")").outerHeight()
            }, b.autoHeightSpeed));
            if (b.preload && d.find("img:eq(" + h + ")").length) {
                a("." + b.container, c).css({
                    background: "url(" + b.preloadImage + ") no-repeat 50% 50%"
                });
                var z = d.find("img:eq(" + h + ")").attr("src") + "?" + (new Date).getTime();
                a("img", c).parent().attr("class") != "slides_control" ? t = d.children(":eq(0)")[0].tagName.toLowerCase() : t = d.find("img:eq(" + h + ")"), d.find("img:eq(" + h + ")").attr("src", z).load(function () {
                    d.find(t + ":eq(" + h + ")").fadeIn(b.fadeSpeed, b.fadeEasing, function () {
                        a(this).css({
                            zIndex: 5
                        }), a("." + b.container, c).css({
                            background: ""
                        }), o = !0, b.slidesLoaded()
                    })
                })
            } else d.children(":eq(" + h + ")").fadeIn(b.fadeSpeed, b.fadeEasing, function () {
                o = !0, b.slidesLoaded()
            });
            b.bigTarget && (d.children().css({
                cursor: "pointer"
            }), d.children().click(function () {
                return w("next", i), !1
            })), b.hoverPause && b.play && (d.bind("mouseover", function () {
                x()
            }), d.bind("mouseleave", function () {
                y()
            })), b.generateNextPrev && (a("." + b.container, c).after('<a href="#" class="' + b.prev + '">Prev</a>'), a("." + b.prev, c).after('<a href="#" class="' + b.next + '">Next</a>')), a("." + b.next, c).click(function (a) {
                a.preventDefault(), b.play && y(), w("next", i)
            }), a("." + b.prev, c).click(function (a) {
                a.preventDefault(), b.play && y(), w("prev", i)
            }), b.generatePagination ? (b.prependPagination ? c.prepend("<ul class=" + b.paginationClass + "></ul>") : c.append("<ul class=" + b.paginationClass + "></ul>"), d.children().each(function () {
                a("." + b.paginationClass, c).append('<li><a href="#' + m + '">' + (m + 1) + "</a></li>"), m++
            })) : a("." + b.paginationClass + " li a", c).each(function () {
                a(this).attr("href", "#" + m), m++
            }), a("." + b.paginationClass + " li:eq(" + h + ")", c).addClass(b.currentClass), a("." + b.paginationClass + " li a", c).click(function () {
                return b.play && y(), q = a(this).attr("href").match("[^#/]+$"), n != q && w("pagination", j, q), !1
            }), a("a.link", c).click(function () {
                return b.play && y(), q = a(this).attr("href").match("[^#/]+$") - 1, n != q && w("pagination", j, q), !1
            }), b.play && (v = setInterval(function () {
                w("next", i)
            }, b.play), c.data("interval", v))
        })
    }, a.fn.slides.option = {
        preload: !0,
        preloadImage: "/img/loading.gif",
        container: "slides_container",
        generateNextPrev: !1,
        next: "next",
        prev: "prev",
        pagination: !0,
        generatePagination: !0,
        prependPagination: !1,
        paginationClass: "pagination",
        currentClass: "current",
        fadeSpeed: 350,
        fadeEasing: "",
        slideSpeed: 350,
        slideEasing: "",
        start: 1,
        effect: "slide",
        crossfade: !1,
        randomize: !1,
        play: 0,
        pause: 0,
        hoverPause: !1,
        autoHeight: !1,
        autoHeightSpeed: 350,
        bigTarget: !1,
        animationStart: function () {},
        animationComplete: function () {},
        slidesLoaded: function () {}
    }, a.fn.randomize = function (b) {
        function c() {
            return Math.round(Math.random()) - .5
        }
        return a(this).each(function () {
            var d = a(this),
                e = d.children(),
                f = e.length;
            if (f > 1) {
                e.hide();
                var g = [];
                for (i = 0; i < f; i++) g[g.length] = i;
                g = g.sort(c), a.each(g, function (a, c) {
                    var f = e.eq(c),
                        g = f.clone(!0);
                    g.show().appendTo(d), b !== undefined && b(f, g), f.remove()
                })
            }
        })
    }
})(jQuery);

function rollover() {
    if (!document.getElementById || !document.createTextNode) {
        return;
    }
    var n = document.getElementById('nav');
    if (!n) {
        return;
    }
    var lis = n.getElementsByTagName('li');
    for (var i = 0; i < lis.length; i++) {
        lis[i].onmouseover = function () {
            this.className = this.className ? 'cur' : 'over';
        }
        lis[i].onmouseout = function () {
            this.className = this.className == 'cur' ? 'cur' : '';
        }
    }
}
window.onload = rollover;

function clearText(getelm, getval) {
    if (getelm.value == getval) {
        getelm.value = "";
    }
}

function fillText(getelm, getval) {
    if (getelm.value == "") {
        getelm.value = getval;
    }
}(function (a) {
    a.fn.easyTabs = function (b) {
        var c = jQuery.extend({
            fadeSpeed: "fast",
            defaultContent: 1,
            activeClass: "active"
        }, b);
        a(this).each(function () {
            function f(d) {
                e();
                a(b + " .tabs li").removeClass(c.activeClass);
                a(b + " .tabs li a." + d + "").closest("li").addClass(c.activeClass);
                if (c.fadeSpeed != "none") {
                    a(b + " #" + d).show()
                } else {
                    a(b + " #" + d).show()
                }
            }
            function e() {
                a(b + " .easytabs-tab-content").hide()
            }
            var b = "#" + this.id;
            if (c.defaultContent == "") {
                c.defaultContent = 1
            }
            if (typeof c.defaultContent == "number") {
                var d = a(b + " .tabs li:eq(" + (c.defaultContent - 1) + ") a").attr("class")
            } else {
                var d = c.defaultContent
            }
            a(b + " .tabs li a").each(function () {
                var b = a(this).attr("class");
                a("#" + b).addClass("easytabs-tab-content")
            });
            e();
            f(d);
            a(b + " .tabs li").click(function () {
                var b = a(this).find("a").attr("class");
                f(b);
                return false
            })
        })
    }
})(jQuery)
//$(document).ready(function(){$('#menu').tabify(); $('#tabItineraries').tabify(); $('#tabsContent').easyTabs({defaultContent:1}); $('#slides').slides({preload:true,preloadImage:'images/loading.gif',play:5000,pause:2500,hoverPause:true});$('.close').click(function(){$(this).parent().parent().hide();});$('#destinationDiv').hide();$('.destinationDiv .pin1').stop(true,true).click(function(){$(this).parent().css("z-index","1000011");$(this).css("z-index","911");$(this).parent().find(".pinhover").fadeIn('slow').animate({opacity:1.0},3000).fadeOut('slow',function(){$(this).hide();$(this).css("z-index","99");$(this).parent().css("z-index","0");});});$("#contact").keydown(function (e) {if (e.shiftKey || e.ctrlKey || e.altKey) { e.preventDefault();} else { var n = e.keyCode; if (!((n == 8)              || (n == 46) || (n >= 35 && n <= 40) || (n >= 48 && n <= 57) || (n >= 96 && n <= 105))) {e.preventDefault();}} });});
$(document).ready(function () {
    $('#menu').tabify();
    $('#tabItineraries').tabify();
    $('#tabsContent').easyTabs({
        defaultContent: 1
    });
    $('#slides').slides({
        preload: true,
        preloadImage: 'images/loading.gif',
        play: 5000,
        pause: 2500,
        hoverPause: true
    });


    $('#destinationDiv').hide();
    $('.destinationDiv .pin1').stop(true, true).click(function () {

        $(this).parent().removeClass('activeli');
        $(this).parent().addClass('activeli');
        $(this).parent().css("z-index", "1000011");
        $(this).css("z-index", "911");
        $(this).parent().find(".pinhover").fadeIn('slow').animate({
            opacity: 1.0
        }, 3000).fadeOut('slow', function () {
            $(this).parent().removeClass('activeli');
            $(this).hide();
            $(this).css("z-index", "99");
            $(this).parent().css("z-index", "0");
            $(this).parent().removeClass('activeli');
        });
    });




    $("#contact").keydown(function (e) {
        if (e.shiftKey || e.ctrlKey || e.altKey) {
            e.preventDefault();
        } else {
            var n = e.keyCode;
            if (!((n == 8) || (n == 46) || (n >= 35 && n <= 40) || (n >= 48 && n <= 57) || (n >= 96 && n <= 105))) {
                e.preventDefault();
            }
        }
    });
});

function checksubscribe() {
    checkedvalidate = true;
    getform = document.subscribe;
    var emailFilter = /^[\w\-\.\+]+\@[a-zA-Z0-9\.\-]+\.[a-zA-z0-9]{2,6}$/;
    var getemail = getform.email.value;
    if ($.trim(getform.email.value) == "" || !(emailFilter.test(getemail))) {
        $('#email').prev().fadeIn();
        checkedvalidate = false;
    } else $('#email').prev().fadeOut();
    if ($.trim(getform.name.value) == "" || getform.name.value == "Enter your name") {
        $('#name').prev().fadeIn();
        checkedvalidate = false;
    } else $('#name').prev().fadeOut();
    if (checkedvalidate) {
        $.post("mailing.php", $("#subscribe").serialize(), function (data) {
            if (data == 'success') {
                $('#loadingbar').fadeIn();
            }
        });
    }
    return false;
}


//Contact Form Validation


function checkContact() {
    checkedvalidate = true;
    getform = document.contactform;

    // FORM FIELD CHECKING
    var emailFilter = /^[\w\-\.\+]+\@[a-zA-Z0-9\.\-]+\.[a-zA-z0-9]{2,6}$/;
    var getemail = getform.email.value;

    //		var datepattern= /\b\d{1,2}[\/-]\d{1,2}[\/-]\d{4}\b/;
    //		var getdate=getform.dateofjourney.value;

    if ($.trim(getform.email.value) == "" || !(emailFilter.test(getemail))) {
        $('#email').prev().fadeIn();
        checkedvalidate = false;
    } else $('#email').prev().fadeOut();


    if ($.trim(getform.name.value) == "" || getform.name.value == "enter name*") {
        $('#name').prev().fadeIn();
        checkedvalidate = false;
    } else $('#name').prev().fadeOut();

    if ($.trim(getform.contact.value) == "" || getform.contact.value == "contact no with country code*") {
        $('#contact').prev().fadeIn();
        checkedvalidate = false;
    } else $('#contact').prev().fadeOut();

    if ($.trim(getform.code.value) == "") {
        $('.captcha_div').prev().fadeIn();
        checkedvalidate = false;
    } else $('.captcha_div').prev().fadeOut();

    if ($.trim(getform.comments.value) == "" || $('#comments').val() == 'enter your requirement*') {
        $('#comments').prev().fadeIn();
        checkedvalidate = false;
    } else $('#comments').prev().fadeOut();



    if (checkedvalidate) {
        $('.loadingprocess').fadeIn();
    }

    return checkedvalidate;

}


//Volunteer Form Validation


function checkvolunteer() {
    checkedvalidate = true;
    getform = document.volunteerform;

    // FORM FIELD CHECKING
    var emailFilter = /^[\w\-\.\+]+\@[a-zA-Z0-9\.\-]+\.[a-zA-z0-9]{2,6}$/;
    var getemail = getform.email.value;

    //		var datepattern= /\b\d{1,2}[\/-]\d{1,2}[\/-]\d{4}\b/;
    //		var getdate=getform.dateofjourney.value;

    if ($.trim(getform.email.value) == "" || !(emailFilter.test(getemail))) {
        $('#email').prev().fadeIn();
        checkedvalidate = false;
    } else $('#email').prev().fadeOut();


    if ($.trim(getform.name.value) == "" || getform.name.value == "enter name*") {
        $('#name').prev().fadeIn();
        checkedvalidate = false;
    } else $('#name').prev().fadeOut();

    if ($.trim(getform.contact.value) == "" || getform.contact.value == "contact no with country code*") {
        $('#contact').prev().fadeIn();
        checkedvalidate = false;
    } else $('#contact').prev().fadeOut();

    if ($.trim(getform.volunteer_role.value) == "" || getform.volunteer_role.value == "role you would like to volunteer for*") {
        $('#volunteer_role').prev().fadeIn();
        checkedvalidate = false;
    } else $('#volunteer_role').prev().fadeOut();

    if ($.trim(getform.relevant.value) == "" || $('#relevant').val() == 'relevant skills / experience*') {
        $('#relevant').prev().fadeIn();
        checkedvalidate = false;
    } else $('#relevant').prev().fadeOut();

    if ($.trim(getform.commitment.value) == "" || $('#commitment').val() == 'period of commitment*') {
        $('#commitment').prev().fadeIn();
        checkedvalidate = false;
    } else $('#commitment').prev().fadeOut();

    if ($.trim(getform.want_to_volunteer.value) == "" || $('#want_to_volunteer').val() == 'why do you want to volunteer with India Untravelled*') {
        $('#want_to_volunteer').prev().fadeIn();
        checkedvalidate = false;
    } else $('#want_to_volunteer').prev().fadeOut();



    if (checkedvalidate) {
        $('.loadingprocess').fadeIn();
    }

    return checkedvalidate;

}

$(document).keydown(function (e) {
    if (e.keyCode == 39) {
        $('a#next').trigger('click');
    } else if (e.keyCode == 37) {
        $('a#prev').trigger('click');
    }
});