! function (e, t) {
    "object" == typeof exports && "object" == typeof module ? module.exports = t() : "function" == typeof define && define.amd ? define([], t) : "object" == typeof exports ? exports.MindElixir = t() : e.MindElixir = t()
}(window, function () {
    return (i = {}, o.m = n = [function (e, t, n) {
        "use strict";
        e.exports = function (n) {
            var r = [];
            return r.toString = function () {
                return this.map(function (e) {
                    var t = function (e, t) {
                        var n = e[1] || "",
                            i = e[3];
                        if (!i) return n;
                        if (t && "function" == typeof btoa) {
                            var o = function (e) {
                                    return "/*# sourceMappingURL=data:application/json;charset=utf-8;base64," + btoa(unescape(encodeURIComponent(JSON.stringify(e)))) + " */"
                                }(i),
                                a = i.sources.map(function (e) {
                                    return "/*# sourceURL=" + i.sourceRoot + e + " */"
                                });
                            return [n].concat(a).concat([o]).join("\n")
                        }
                        return [n].join("\n")
                    }(e, n);
                    return e[2] ? "@media " + e[2] + "{" + t + "}" : t
                }).join("")
            }, r.i = function (e, t) {
                "string" == typeof e && (e = [
                    [null, e, ""]
                ]);
                for (var n = {}, i = 0; i < this.length; i++) {
                    var o = this[i][0];
                    null != o && (n[o] = !0)
                }
                for (i = 0; i < e.length; i++) {
                    var a = e[i];
                    null != a[0] && n[a[0]] || (t && !a[2] ? a[2] = t : t && (a[2] = "(" + a[2] + ") and (" + t + ")"), r.push(a))
                }
            }, r
        }
    }, function (e, t, i) {
        var n, o, a, d = {},
            s = (n = function () {
                return window && document && document.all && !window.atob
            }, function () {
                return void 0 === o && (o = n.apply(this, arguments)), o
            }),
            r = (a = {}, function (e, t) {
                if ("function" == typeof e) return e();
                if (void 0 === a[e]) {
                    var n = function (e, t) {
                        return t ? t.querySelector(e) : document.querySelector(e)
                    }.call(this, e, t);
                    if (window.HTMLIFrameElement && n instanceof window.HTMLIFrameElement) try {
                        n = n.contentDocument.head
                    } catch (e) {
                        n = null
                    }
                    a[e] = n
                }
                return a[e]
            }),
            c = null,
            l = 0,
            p = [],
            h = i(5);

        function u(e, t) {
            for (var n = 0; n < e.length; n++) {
                var i = e[n],
                    o = d[i.id];
                if (o) {
                    o.refs++;
                    for (var a = 0; a < o.parts.length; a++) o.parts[a](i.parts[a]);
                    for (; a < i.parts.length; a++) o.parts.push(x(i.parts[a], t))
                } else {
                    var r = [];
                    for (a = 0; a < i.parts.length; a++) r.push(x(i.parts[a], t));
                    d[i.id] = {
                        id: i.id,
                        refs: 1,
                        parts: r
                    }
                }
            }
        }

        function f(e, t) {
            for (var n = [], i = {}, o = 0; o < e.length; o++) {
                var a = e[o],
                    r = t.base ? a[0] + t.base : a[0],
                    c = {
                        css: a[1],
                        media: a[2],
                        sourceMap: a[3]
                    };
                i[r] ? i[r].parts.push(c) : n.push(i[r] = {
                    id: r,
                    parts: [c]
                })
            }
            return n
        }

        function m(e, t) {
            var n = r(e.insertInto);
            if (!n) throw new Error("Couldn't find a style target. This probably means that the value for the 'insertInto' parameter is invalid.");
            var i = p[p.length - 1];
            if ("top" === e.insertAt) i ? i.nextSibling ? n.insertBefore(t, i.nextSibling) : n.appendChild(t) : n.insertBefore(t, n.firstChild), p.push(t);
            else if ("bottom" === e.insertAt) n.appendChild(t);
            else {
                if ("object" != typeof e.insertAt || !e.insertAt.before) throw new Error("[Style Loader]\n\n Invalid value for parameter 'insertAt' ('options.insertAt') found.\n Must be 'top', 'bottom', or Object.\n (https://github.com/webpack-contrib/style-loader#insertat)\n");
                var o = r(e.insertAt.before, n);
                n.insertBefore(t, o)
            }
        }

        function b(e) {
            if (null === e.parentNode) return !1;
            e.parentNode.removeChild(e);
            var t = p.indexOf(e);
            0 <= t && p.splice(t, 1)
        }

        function g(e) {
            var t = document.createElement("style");
            if (void 0 === e.attrs.type && (e.attrs.type = "text/css"), void 0 === e.attrs.nonce) {
                var n = function () {
                    0;
                    return i.nc
                }();
                n && (e.attrs.nonce = n)
            }
            return v(t, e.attrs), m(e, t), t
        }

        function v(t, n) {
            Object.keys(n).forEach(function (e) {
                t.setAttribute(e, n[e])
            })
        }

        function x(t, e) {
            var n, i, o, a;
            if (e.transform && t.css) {
                if (!(a = "function" == typeof e.transform ? e.transform(t.css) : e.transform.default(t.css))) return function () {};
                t.css = a
            }
            if (e.singleton) {
                var r = l++;
                n = c = c || g(e), i = N.bind(null, n, r, !1), o = N.bind(null, n, r, !0)
            } else o = t.sourceMap && "function" == typeof URL && "function" == typeof URL.createObjectURL && "function" == typeof URL.revokeObjectURL && "function" == typeof Blob && "function" == typeof btoa ? (n = function (e) {
                var t = document.createElement("link");
                return void 0 === e.attrs.type && (e.attrs.type = "text/css"), e.attrs.rel = "stylesheet", v(t, e.attrs), m(e, t), t
            }(e), i = function (e, t, n) {
                var i = n.css,
                    o = n.sourceMap,
                    a = void 0 === t.convertToAbsoluteUrls && o;
                (t.convertToAbsoluteUrls || a) && (i = h(i));
                o && (i += "\n/*# sourceMappingURL=data:application/json;base64," + btoa(unescape(encodeURIComponent(JSON.stringify(o)))) + " */");
                var r = new Blob([i], {
                        type: "text/css"
                    }),
                    c = e.href;
                e.href = URL.createObjectURL(r), c && URL.revokeObjectURL(c)
            }.bind(null, n, e), function () {
                b(n), n.href && URL.revokeObjectURL(n.href)
            }) : (n = g(e), i = function (e, t) {
                var n = t.css,
                    i = t.media;
                i && e.setAttribute("media", i);
                if (e.styleSheet) e.styleSheet.cssText = n;
                else {
                    for (; e.firstChild;) e.removeChild(e.firstChild);
                    e.appendChild(document.createTextNode(n))
                }
            }.bind(null, n), function () {
                b(n)
            });
            return i(t),
                function (e) {
                    if (e) {
                        if (e.css === t.css && e.media === t.media && e.sourceMap === t.sourceMap) return;
                        i(t = e)
                    } else o()
                }
        }
        e.exports = function (e, r) {
            if ("undefined" != typeof DEBUG && DEBUG && "object" != typeof document) throw new Error("The style-loader cannot be used in a non-browser environment");
            (r = r || {}).attrs = "object" == typeof r.attrs ? r.attrs : {}, r.singleton || "boolean" == typeof r.singleton || (r.singleton = s()), r.insertInto || (r.insertInto = "head"), r.insertAt || (r.insertAt = "bottom");
            var c = f(e, r);
            return u(c, r),
                function (e) {
                    for (var t = [], n = 0; n < c.length; n++) {
                        var i = c[n];
                        (o = d[i.id]).refs--, t.push(o)
                    }
                    e && u(f(e, r), r);
                    for (n = 0; n < t.length; n++) {
                        var o;
                        if (0 === (o = t[n]).refs) {
                            for (var a = 0; a < o.parts.length; a++) o.parts[a]();
                            delete d[o.id]
                        }
                    }
                }
        };
        var y, w = (y = [], function (e, t) {
            return y[e] = t, y.filter(Boolean).join("\n")
        });

        function N(e, t, n, i) {
            var o = n ? "" : i.css;
            if (e.styleSheet) e.styleSheet.cssText = w(t, o);
            else {
                var a = document.createTextNode(o),
                    r = e.childNodes;
                r[t] && e.removeChild(r[t]), r.length ? e.insertBefore(a, r[t]) : e.appendChild(a)
            }
        }
    }, function (e) {
        e.exports = JSON.parse('{"name":"mind-elixir","version":"0.10.2","description":"Mind elixir is a free open source mind map core.","main":"dist/mind-elixir.js","scripts":{"start":"webpack-dev-server --mode development","lite":"webpack --mode production --env.lite=1","test":"echo \\"Error: no test specified\\" && exit 1","build":"webpack --mode production --env.lite=0","doc":"./node_modules/.bin/jsdoc src/ -R readme.md -c conf.json","md":"./node_modules/.bin/jsdoc2md \'src/*.js\' > api.md"},"files":["package.json","dist"],"author":"","license":"MIT","devDependencies":{"@babel/core":"^7.4.5","@babel/preset-env":"^7.4.5","babel-loader":"^8.0.6","css-loader":"^2.1.1","docdash":"^1.1.1","file-loader":"^4.0.0","html-webpack-plugin":"^3.2.0","jsdoc":"^3.6.3","jsdoc-to-markdown":"^5.0.0","less":"^3.9.0","less-loader":"^5.0.0","style-loader":"^0.23.1","uglifyjs-webpack-plugin":"^2.1.3","url-loader":"^2.0.0","webpack":"^4.33.0","webpack-bundle-analyzer":"^3.3.2","webpack-cli":"^3.3.2","webpack-dev-server":"^3.5.1"},"dependencies":{"hotkeys-js":"^3.6.11"}}')
    }, function (e, t, n) {
        var i = n(4);
        "string" == typeof i && (i = [
            [e.i, i, ""]
        ]);
        var o = {
            hmr: !0,
            transform: void 0,
            insertInto: void 0
        };
        n(1)(i, o);
        i.locals && (e.exports = i.locals)
    }, function (e, t, n) {
        (e.exports = n(0)(!1)).push([e.i, ".mind-elixir {\n  position: relative;\n}\n.map-container {\n  user-select: none;\n  height: 100%;\n  width: 100%;\n  overflow: scroll !important;\n  font-size: 15px;\n}\n.map-container::-webkit-scrollbar {\n  width: 0px;\n  height: 0px;\n}\n.map-container .focus-mode {\n  position: absolute;\n  top: 0;\n  left: 0;\n  height: 100%;\n  width: 100%;\n  background: #fff;\n}\n.map-container .map-canvas {\n  height: 20000px;\n  width: 20000px;\n  position: relative;\n  user-select: none;\n  transition: all 0.3s;\n  transform: scale(1);\n  background: #f6f6f6;\n}\n.map-container .map-canvas .selected {\n  border: 2px solid #217CE8;\n box-shadow: 0px 4px 30px rgba(22, 33, 74, 0.08);\n}\n.map-container .map-canvas root {\n  position: absolute;\n}\n.map-container .map-canvas root tpc {\n  color: #ffffff;\n  padding: 10px 15px;\n  background-color: #3324f5;\n box-shadow: 0px 4px 30px rgba(22, 33, 74, 0.05);\n  border-radius: 5px;\n  font-size: 25px;\n}\n.map-container .map-canvas root tpc [contentEditable] {\n  position: absolute;\n  top: 0;\n  left: 0;\n  background-color: #00aaff;\n  max-width: 300px;\n  z-index: 11;\n  -webkit-user-select: auto;\n}\n.map-container .box > grp {\n  position: absolute;\n}\n.map-container .box > grp > t > tpc {\n  background-color: #ffffff;\n  border: none;\n box-shadow: 0px 4px 30px rgba(22, 33, 74, 0.05);\n border-radius: 5px;\n  color: #735c45;\n  padding: 8px 10px;\n  margin: 0;\n}\n.map-container .box > grp > t > tpc [contentEditable] {\n  position: absolute;\n  top: 0;\n  left: 0;\n  background-color: #fff;\n  max-width: 300px;\n  padding: 8px 10px;\n  z-index: 11;\n  direction: ltr;\n  -webkit-user-select: auto;\n}\n.map-container .box .lhs {\n  direction: rtl;\n}\n.map-container .box .lhs tpc {\n  direction: ltr;\n}\n.map-container .box grp {\n  display: block;\n  pointer-events: none;\n}\n.map-container .box children,\n.map-container .box t {\n  display: inline-block;\n  vertical-align: middle;\n}\n.map-container .box t {\n  position: relative;\n  cursor: pointer;\n  padding: 0 15px;\n  margin-top: 10px;\n}\n.map-container .box t tpc {\n  position: relative;\n  display: block;\n  padding: 5px;\n  border-radius: 3px;\n  color: #666666;\n  pointer-events: all;\n  max-width: 800px;\n}\n.map-container .box t tpc [contentEditable] {\n  position: absolute;\n  top: 0;\n  left: 0;\n  background-color: #fff;\n  max-width: 300px;\n  padding: 5px;\n  z-index: 11;\n  direction: ltr;\n  -webkit-user-select: auto;\n}\n.map-container .box t tpc .tags {\n  direction: ltr;\n}\n.map-container .box t tpc .tags span {\n  display: inline-block;\n  border-radius: 3px;\n  padding: 2px 4px;\n  background: #d6f0f8;\n  color: #276f86;\n  margin: 0px;\n  font-size: 12px;\n  height: 16px;\n  line-height: 16px;\n  margin-right: 3px;\n  margin-top: 2px;\n}\n.map-container .box t tpc .icons {\n  display: inline-block;\n  direction: ltr;\n  margin-right: 10px;\n}\n.map-container .box t epd {\n  position: absolute;\n  height: 12px;\n  width: 12px;\n  line-height: 12px;\n  text-align: center;\n  border-radius: 50%;\n  border: 1px solid #4f4f4f;\n  background-color: #fff;\n  pointer-events: all;\n  z-index: 9;\n}\n.map-container .box t epd.minus {\n  transition: all 0.3s;\n  opacity: 0;\n}\n.map-container .box t epd.minus:hover {\n  opacity: 1;\n}\n.map-container .icon {\n  width: 1em;\n  height: 1em;\n  vertical-align: -0.15em;\n  fill: currentColor;\n  overflow: hidden;\n}\n.map-container .svg2nd,\n.map-container .svg3rd,\n.map-container .topiclinks,\n.map-container .linkcontroller {\n  position: absolute;\n  height: 100%;\n  width: 100%;\n  top: 0;\n  left: 0;\n}\n.map-container .topiclinks,\n.map-container .linkcontroller {\n  pointer-events: none;\n}\n.map-container .topiclinks g,\n.map-container .linkcontroller g {\n  pointer-events: all;\n}\n.map-container .svg2nd,\n.map-container .svg3rd {\n  pointer-events: none;\n  z-index: -1;\n}\n.map-container .topiclinks *,\n.map-container .linkcontroller * {\n  z-index: 100;\n}\n.map-container .topiclinks g {\n  cursor: pointer;\n}\n.down t,\n.down children {\n  display: block !important;\n}\n.down grp {\n  display: inline-block !important;\n}\n.circle {\n  position: absolute;\n  height: 10px;\n  width: 10px;\n  margin-top: -5px;\n  margin-left: -5px;\n  border-radius: 100%;\n  background: #aaa;\n  cursor: pointer;\n}\n", ""])
    }, function (e, t) {
        e.exports = function (e) {
            var t = "undefined" != typeof window && window.location;
            if (!t) throw new Error("fixUrls requires window.location");
            if (!e || "string" != typeof e) return e;
            var o = t.protocol + "//" + t.host,
                a = o + t.pathname.replace(/\/[^\/]*$/, "/");
            return e.replace(/url\s*\(((?:[^)(]|\((?:[^)(]+|\([^)(]*\))*\))*)\)/gi, function (e, t) {
                var n, i = t.trim().replace(/^"(.*)"$/, function (e, t) {
                    return t
                }).replace(/^'(.*)'$/, function (e, t) {
                    return t
                });
                return /^(#|data:|http:\/\/|https:\/\/|file:\/\/\/|\s*$)/i.test(i) ? e : (n = 0 === i.indexOf("//") ? i : 0 === i.indexOf("/") ? o + i : a + i.replace(/^\.\//, ""), "url(" + JSON.stringify(n) + ")")
            })
        }
    }, function (e, t, n) {
        var i = n(7);
        "string" == typeof i && (i = [
            [e.i, i, ""]
        ]);
        var o = {
            hmr: !0,
            transform: void 0,
            insertInto: void 0
        };
        n(1)(i, o);
        i.locals && (e.exports = i.locals)
    }, function (e, t, n) {
        (e.exports = n(0)(!1)).push([e.i, "cmenu {\n  position: fixed;\n  top: 0;\n  left: 0;\n  width: 100%;\n  height: 100%;\n  z-index: 99;\n}\ncmenu .menu-list {\n  position: fixed;\n  list-style: none;\n  margin: 0;\n  padding: 0;\n  font: 300 15px 'Roboto', sans-serif;\n  color: #333;\n  box-shadow: 0 12px 15px 0 rgba(0, 0, 0, 0.2);\n}\ncmenu .menu-list * {\n  transition: color 0.4s, background 0.4s;\n}\ncmenu .menu-list li {\n  min-width: 150px;\n  overflow: hidden;\n  white-space: nowrap;\n  padding: 6px 10px;\n  background-color: #fff;\n  border-bottom: 1px solid #ecf0f1;\n}\ncmenu .menu-list li a {\n  color: #333;\n  text-decoration: none;\n}\ncmenu .menu-list li:hover {\n  background-color: #ecf0f1;\n}\ncmenu .menu-list li:first-child {\n  border-radius: 5px 5px 0 0;\n}\ncmenu .menu-list li:last-child {\n  border-bottom: 0;\n  border-radius: 0 0 5px 5px;\n}\ncmenu .menu-list li span:last-child {\n  float: right;\n}\n", ""])
    }, function (e, t, n) {
        var i = n(9);
        "string" == typeof i && (i = [
            [e.i, i, ""]
        ]);
        var o = {
            hmr: !0,
            transform: void 0,
            insertInto: void 0
        };
        n(1)(i, o);
        i.locals && (e.exports = i.locals)
    }, function (e, t, n) {
        (e.exports = n(0)(!1)).push([e.i, "toolbar {\n  position: absolute;\n  background: #fff;\n  padding: 10px;\n  border-radius: 5px;\n  box-shadow: 0 1px 2px 0 rgba(0, 0, 0, 0.2);\n}\ntoolbar span:active {\n  opacity: 0.5;\n}\n.rb {\n  right: 20px;\n  bottom: 20px;\n  font-family: iconfont;\n}\n.rb span + span {\n  margin-left: 10px;\n}\n.lt {\n  font-size: 20px;\n  left: 20px;\n  top: 20px;\n  width: 20px;\n}\n.lt span {\n  display: block;\n}\n.lt span + span {\n  margin-top: 10px;\n}\n", ""])
    }, function (e, t, n) {
        var i = n(11);
        "string" == typeof i && (i = [
            [e.i, i, ""]
        ]);
        var o = {
            hmr: !0,
            transform: void 0,
            insertInto: void 0
        };
        n(1)(i, o);
        i.locals && (e.exports = i.locals)
    }, function (e, t, n) {
        (e.exports = n(0)(!1)).push([e.i, "nmenu {\n  position: absolute;\n  right: 20px;\n  top: 20px;\n  background: #fff;\n  padding: 10px;\n  border-radius: 5px;\n  box-shadow: 0 1px 2px 0 rgba(0, 0, 0, 0.2);\n  width: 240px;\n  box-sizing: border-box;\n  padding: 0 15px 15px;\n  transition: 0.3s all;\n}\nnmenu.close {\n  height: 30px;\n  width: 50px;\n  overflow: hidden;\n}\nnmenu .button-container {\n  padding: 3px 0;\n  direction: rtl;\n}\nnmenu #nm-tag {\n  margin-top: 20px;\n}\nnmenu .nm-fontsize-container {\n  display: flex;\n  justify-content: space-around;\n  margin-bottom: 20px;\n}\nnmenu .nm-fontsize-container div {\n  height: 36px;\n  width: 36px;\n  display: flex;\n  align-items: center;\n  justify-content: center;\n  box-shadow: 0 1px 2px 0 rgba(0, 0, 0, 0.2);\n  background-color: white;\n  color: tomato;\n  border-radius: 100%;\n}\nnmenu .nm-fontcolor-container {\n  margin-bottom: 10px;\n}\nnmenu input {\n  background: #f7f9fa;\n  border: 1px solid #dce2e6;\n  border-radius: 3px;\n  padding: 5px;\n  margin: 10px 0;\n  width: 100%;\n  box-sizing: border-box;\n}\nnmenu .split6 {\n  display: inline-block;\n  width: 16.66%;\n  margin-bottom: 5px;\n}\nnmenu .palette {\n  border-radius: 100%;\n  width: 21px;\n  height: 21px;\n  border: 1px solid #edf1f2;\n  margin: auto;\n}\nnmenu .nmenu-selected,\nnmenu .palette:hover {\n  box-shadow: tomato 0 0 0 2px;\n  background-color: #c7e9fa;\n}\nnmenu .size-selected {\n  background-color: tomato !important;\n  border-color: tomato;\n  fill: white;\n  color: white;\n}\nnmenu .size-selected svg {\n  color: #fff;\n}\nnmenu .bof {\n  text-align: center;\n}\nnmenu .bof span {\n  display: inline-block;\n  font-size: 14px;\n  border-radius: 4px;\n  padding: 2px 5px;\n}\nnmenu .bof .selected {\n  background-color: tomato;\n  color: white;\n}\n", ""])
    }, function (e, t) {
        ! function (r) {
            var e, c = '<svg><symbol id="icon-a" viewBox="0 0 1024 1024"><path d="M757.76 665.6q0 20.48 1.536 34.304t7.68 22.016 18.944 12.288 34.304 4.096q-3.072 25.6-15.36 44.032-11.264 16.384-33.28 29.696t-62.976 13.312q-11.264 0-20.48-0.512t-17.408-2.56l-6.144-2.048-1.024 0q-4.096-1.024-10.24-4.096-2.048-2.048-4.096-2.048-1.024-1.024-2.048-1.024-14.336-8.192-23.552-17.408t-14.336-17.408q-6.144-10.24-9.216-20.48-63.488 75.776-178.176 75.776-48.128 0-88.064-15.36t-69.12-44.032-45.056-68.096-15.872-88.576 16.896-89.088 47.616-67.584 74.24-42.496 96.768-14.848q48.128 0 88.576 17.408t66.048 49.152q0-8.192 0.512-16.384t0.512-15.36q0-71.68-39.936-104.448t-128-32.768q-43.008 0-84.992 6.656t-84.992 17.92q14.336-28.672 25.088-47.616t24.064-29.184q30.72-24.576 158.72-24.576 79.872 0 135.168 13.824t90.624 43.52 51.2 75.264 15.872 108.032l0 200.704zM487.424 743.424q50.176 0 79.872-33.28t29.696-95.744q0-61.44-28.672-93.696t-76.8-32.256q-52.224 0-82.944 33.28t-30.72 94.72q0 58.368 31.744 92.672t77.824 34.304z"  ></path></symbol><symbol id="icon-add" viewBox="0 0 1024 1024"><path d="M863.328 482.56l-317.344-1.12L545.984 162.816c0-17.664-14.336-32-32-32s-32 14.336-32 32l0 318.4L159.616 480.064c-0.032 0-0.064 0-0.096 0-17.632 0-31.936 14.24-32 31.904C127.424 529.632 141.728 544 159.392 544.064l322.592 1.152 0 319.168c0 17.696 14.336 32 32 32s32-14.304 32-32l0-318.944 317.088 1.12c0.064 0 0.096 0 0.128 0 17.632 0 31.936-14.24 32-31.904C895.264 496.992 880.96 482.624 863.328 482.56z"  ></path></symbol><symbol id="icon-move" viewBox="0 0 1024 1024"><path d="M863.744 544 163.424 544c-17.664 0-32-14.336-32-32s14.336-32 32-32l700.32 0c17.696 0 32 14.336 32 32S881.44 544 863.744 544z"  ></path></symbol><symbol id="icon-full" viewBox="0 0 1024 1024"><path d="M639.328 416c8.032 0 16.096-3.008 22.304-9.056l202.624-197.184-0.8 143.808c-0.096 17.696 14.144 32.096 31.808 32.192 0.064 0 0.128 0 0.192 0 17.6 0 31.904-14.208 32-31.808l1.248-222.208c0-0.672-0.352-1.248-0.384-1.92 0.032-0.512 0.288-0.896 0.288-1.408 0.032-17.664-14.272-32-31.968-32.032L671.552 96l-0.032 0c-17.664 0-31.968 14.304-32 31.968C639.488 145.632 653.824 160 671.488 160l151.872 0.224-206.368 200.8c-12.672 12.32-12.928 32.608-0.64 45.248C622.656 412.736 630.976 416 639.328 416z"  ></path><path d="M896.032 639.552 896.032 639.552c-17.696 0-32 14.304-32.032 31.968l-0.224 151.872-200.832-206.4c-12.32-12.64-32.576-12.96-45.248-0.64-12.672 12.352-12.928 32.608-0.64 45.248l197.184 202.624-143.808-0.8c-0.064 0-0.128 0-0.192 0-17.6 0-31.904 14.208-32 31.808-0.096 17.696 14.144 32.096 31.808 32.192l222.24 1.248c0.064 0 0.128 0 0.192 0 0.64 0 1.12-0.32 1.76-0.352 0.512 0.032 0.896 0.288 1.408 0.288l0.032 0c17.664 0 31.968-14.304 32-31.968L928 671.584C928.032 653.952 913.728 639.584 896.032 639.552z"  ></path><path d="M209.76 159.744l143.808 0.8c0.064 0 0.128 0 0.192 0 17.6 0 31.904-14.208 32-31.808 0.096-17.696-14.144-32.096-31.808-32.192L131.68 95.328c-0.064 0-0.128 0-0.192 0-0.672 0-1.248 0.352-1.888 0.384-0.448 0-0.8-0.256-1.248-0.256 0 0-0.032 0-0.032 0-17.664 0-31.968 14.304-32 31.968L96 352.448c-0.032 17.664 14.272 32 31.968 32.032 0 0 0.032 0 0.032 0 17.664 0 31.968-14.304 32-31.968l0.224-151.936 200.832 206.4c6.272 6.464 14.624 9.696 22.944 9.696 8.032 0 16.096-3.008 22.304-9.056 12.672-12.32 12.96-32.608 0.64-45.248L209.76 159.744z"  ></path><path d="M362.368 617.056l-202.624 197.184 0.8-143.808c0.096-17.696-14.144-32.096-31.808-32.192-0.064 0-0.128 0-0.192 0-17.6 0-31.904 14.208-32 31.808l-1.248 222.24c0 0.704 0.352 1.312 0.384 2.016 0 0.448-0.256 0.832-0.256 1.312-0.032 17.664 14.272 32 31.968 32.032L352.448 928c0 0 0.032 0 0.032 0 17.664 0 31.968-14.304 32-31.968s-14.272-32-31.968-32.032l-151.936-0.224 206.4-200.832c12.672-12.352 12.96-32.608 0.64-45.248S375.008 604.704 362.368 617.056z"  ></path></symbol><symbol id="icon-living" viewBox="0 0 1024 1024"><path d="M514.133333 488.533333m-106.666666 0a106.666667 106.666667 0 1 0 213.333333 0 106.666667 106.666667 0 1 0-213.333333 0Z" fill="#666666" ></path><path d="M512 64C264.533333 64 64 264.533333 64 512c0 236.8 183.466667 428.8 416 445.866667v-134.4c-53.333333-59.733333-200.533333-230.4-200.533333-334.933334 0-130.133333 104.533333-234.666667 234.666666-234.666666s234.666667 104.533333 234.666667 234.666666c0 61.866667-49.066667 153.6-145.066667 270.933334l-59.733333 68.266666V960C776.533333 942.933333 960 748.8 960 512c0-247.466667-200.533333-448-448-448z" fill="#666666" ></path></symbol><symbol id="icon-close" viewBox="0 0 1024 1024"><path d="M557.312 513.248l265.28-263.904c12.544-12.48 12.608-32.704 0.128-45.248-12.512-12.576-32.704-12.608-45.248-0.128L512.128 467.904l-263.04-263.84c-12.448-12.48-32.704-12.544-45.248-0.064-12.512 12.48-12.544 32.736-0.064 45.28l262.976 263.776L201.6 776.8c-12.544 12.48-12.608 32.704-0.128 45.248a31.937 31.937 0 0 0 22.688 9.44c8.16 0 16.32-3.104 22.56-9.312l265.216-263.808 265.44 266.24c6.24 6.272 14.432 9.408 22.656 9.408a31.94 31.94 0 0 0 22.592-9.344c12.512-12.48 12.544-32.704 0.064-45.248L557.312 513.248z" fill="" ></path></symbol><symbol id="icon-menu" viewBox="0 0 1024 1024"><path d="M109.714 292.571h804.572c21.943 0 36.571-21.942 36.571-43.885 0-14.629-14.628-29.257-36.571-29.257H109.714c-21.943 0-36.571 14.628-36.571 36.571 0 14.629 14.628 36.571 36.571 36.571zM914.286 512H109.714c-21.943 0-36.571 14.629-36.571 36.571 0 14.629 14.628 36.572 36.571 36.572h804.572c21.943 0 36.571-21.943 36.571-43.886 0-14.628-14.628-29.257-36.571-29.257z m0 292.571H109.714c-21.943 0-36.571 14.629-36.571 36.572s14.628 36.571 36.571 36.571h804.572c21.943 0 36.571-21.943 36.571-36.571 0-21.943-14.628-36.572-36.571-36.572z"  ></path></symbol><symbol id="icon-B" viewBox="0 0 1024 1024"><path d="M98.067692 65.457231H481.28c75.854769 0 132.411077 3.150769 169.668923 9.452307 37.336615 6.301538 70.656 19.534769 100.036923 39.620924 29.459692 20.007385 53.956923 46.710154 73.570462 80.029538 19.692308 33.398154 29.459692 70.734769 29.459692 112.167385 0 44.898462-12.130462 86.094769-36.233846 123.588923a224.886154 224.886154 0 0 1-98.461539 84.283077c58.368 17.092923 103.266462 46.08 134.695385 87.04 31.350154 40.96 47.025231 89.088 47.025231 144.462769 0 43.638154-10.082462 86.016-30.404923 127.212308-20.243692 41.196308-47.891692 74.043077-83.02277 98.697846-35.052308 24.654769-78.296615 39.778462-129.732923 45.449846-32.295385 3.465846-110.119385 5.671385-233.472 6.537846H98.067692V65.457231z m193.536 159.507692V446.621538h126.818462c75.460923 0 122.328615-1.024 140.603077-3.229538 33.083077-3.938462 59.155692-15.36 78.139077-34.343385 18.904615-18.904615 28.435692-43.874462 28.435692-74.830769 0-29.696-8.192-53.720615-24.497231-72.310154-16.384-18.510769-40.644923-29.696-72.940307-33.634461-19.140923-2.205538-74.279385-3.308308-165.415385-3.308308h-111.064615z m0 381.243077v256.315077h179.2c69.710769 0 113.979077-1.969231 132.726154-5.907692 28.750769-5.198769 52.145231-17.959385 70.262154-38.281847 18.116923-20.243692 27.096615-47.340308 27.096615-81.368615 0-28.750769-6.931692-53.169231-20.873846-73.255385a118.232615 118.232615 0 0 0-60.494769-43.795692c-26.387692-9.137231-83.574154-13.705846-171.638154-13.705846H291.603692z"  ></path></symbol><symbol id="icon-right" viewBox="0 0 1024 1024"><path d="M385 560.69999999L385 738.9c0 36.90000001 26.4 68.5 61.3 68.5l150.2 0c1.5 0 3-0.1 4.5-0.3 10.2 38.7 45.5 67.3 87.5 67.3 50 0 90.5-40.5 90.5-90.5s-40.5-90.5-90.5-90.5c-42 0-77.3 28.6-87.5 67.39999999-1.4-0.3-2.9-0.4-4.5-0.39999999L446.3 760.4c-6.8 0-14.3-8.9-14.3-21.49999999l0-427.00000001c0-12.7 7.40000001-21.5 14.30000001-21.5l150.19999999 0c1.5 0 3-0.2 4.5-0.4 10.2 38.8 45.5 67.3 87.5 67.3 50 0 90.5-40.5 90.5-90.4 0-49.9-40.5-90.6-90.5-90.59999999-42 0-77.3 28.6-87.5 67.39999999-1.4-0.2-2.9-0.4-4.49999999-0.4L446.3 243.3c-34.80000001 0-61.3 31.6-61.3 68.50000001L385 513.7l-79.1 0c-10.4-38.5-45.49999999-67-87.4-67-50 0-90.5 40.5-90.5 90.5s40.5 90.5 90.5 90.5c41.79999999 0 77.00000001-28.4 87.4-67L385 560.69999999z" fill="#333333" ></path></symbol><symbol id="icon-left" viewBox="0 0 1024 1024"><path d="M639 463.30000001L639 285.1c0-36.90000001-26.4-68.5-61.3-68.5l-150.2 0c-1.5 0-3 0.1-4.5 0.3-10.2-38.7-45.5-67.3-87.5-67.3-50 0-90.5 40.5-90.5 90.5s40.5 90.5 90.5 90.5c42 0 77.3-28.6 87.5-67.39999999 1.4 0.3 2.9 0.4 4.5 0.39999999L577.7 263.6c6.8 0 14.3 8.9 14.3 21.49999999l0 427.00000001c0 12.7-7.40000001 21.5-14.30000001 21.5l-150.19999999 0c-1.5 0-3 0.2-4.5 0.4-10.2-38.8-45.5-67.3-87.5-67.3-50 0-90.5 40.5-90.5 90.4 0 49.9 40.5 90.6 90.5 90.59999999 42 0 77.3-28.6 87.5-67.39999999 1.4 0.2 2.9 0.4 4.49999999 0.4L577.7 780.7c34.80000001 0 61.3-31.6 61.3-68.50000001L639 510.3l79.1 0c10.4 38.5 45.49999999 67 87.4 67 50 0 90.5-40.5 90.5-90.5s-40.5-90.5-90.5-90.5c-41.79999999 0-77.00000001 28.4-87.4 67L639 463.30000001z" fill="#333333" ></path></symbol><symbol id="icon-side" viewBox="0 0 1024 1024"><path d="M851.91168 328.45312c-59.97056 0-108.6208 48.47104-108.91264 108.36992l-137.92768 38.4a109.14304 109.14304 0 0 0-63.46752-46.58688l1.39264-137.11872c47.29344-11.86816 82.31936-54.66624 82.31936-105.64096 0-60.15488-48.76288-108.91776-108.91776-108.91776s-108.91776 48.76288-108.91776 108.91776c0 49.18784 32.60928 90.75712 77.38368 104.27392l-1.41312 138.87488a109.19936 109.19936 0 0 0-63.50336 48.55808l-138.93632-39.48544 0.01024-0.72704c0-60.15488-48.76288-108.91776-108.91776-108.91776s-108.91776 48.75776-108.91776 108.91776c0 60.15488 48.76288 108.91264 108.91776 108.91264 39.3984 0 73.91232-20.92032 93.03552-52.2496l139.19232 39.552-0.00512 0.2304c0 25.8304 9.00096 49.5616 24.02816 68.23424l-90.14272 132.63872a108.7488 108.7488 0 0 0-34.2528-5.504c-60.15488 0-108.91776 48.768-108.91776 108.91776 0 60.16 48.76288 108.91776 108.91776 108.91776 60.16 0 108.92288-48.75776 108.92288-108.91776 0-27.14624-9.9328-51.968-26.36288-71.04l89.04704-131.03104a108.544 108.544 0 0 0 37.6832 6.70208 108.672 108.672 0 0 0 36.48512-6.272l93.13792 132.57216a108.48256 108.48256 0 0 0-24.69888 69.0688c0 60.16 48.768 108.92288 108.91776 108.92288 60.16 0 108.91776-48.76288 108.91776-108.92288 0-60.14976-48.75776-108.91776-108.91776-108.91776a108.80512 108.80512 0 0 0-36.69504 6.3488l-93.07136-132.48a108.48768 108.48768 0 0 0 24.79616-72.22784l136.09984-37.888c18.99008 31.93856 53.84192 53.3504 93.69088 53.3504 60.16 0 108.92288-48.75776 108.92288-108.91264-0.00512-60.15488-48.77312-108.92288-108.92288-108.92288z"  ></path></symbol></svg>';
            if ((e = document.getElementsByTagName("script"))[e.length - 1].getAttribute("data-injectcss") && !r.__iconfont__svg__cssinject__) {
                r.__iconfont__svg__cssinject__ = !0;
                try {
                    document.write("<style>.svgfont {display: inline-block;width: 1em;height: 1em;fill: currentColor;vertical-align: -0.1em;font-size:16px;}</style>")
                } catch (e) {
                    console
                }
            }! function (t) {
                if (document.addEventListener)
                    if (~["complete", "loaded", "interactive"].indexOf(document.readyState)) setTimeout(t, 0);
                    else {
                        document.addEventListener("DOMContentLoaded", function e() {
                            document.removeEventListener("DOMContentLoaded", e, !1), t()
                        }, !1)
                    }
                else document.attachEvent && (n = t, i = r.document, o = !1, (a = function () {
                    try {
                        i.documentElement.doScroll("left")
                    } catch (e) {
                        return void setTimeout(a, 50)
                    }
                    e()
                })(), i.onreadystatechange = function () {
                    "complete" == i.readyState && (i.onreadystatechange = null, e())
                });

                function e() {
                    o || (o = !0, n())
                }
                var n, i, o, a
            }(function () {
                var e, t, n, i, o, a;
                (e = document.createElement("div")).innerHTML = c, c = null, (t = e.getElementsByTagName("svg")[0]) && (t.setAttribute("aria-hidden", "true"), t.style.position = "absolute", t.style.width = 0, t.style.height = 0, t.style.overflow = "hidden", n = t, (i = document.body).firstChild ? (o = n, (a = i.firstChild).parentNode.insertBefore(o, a)) : i.appendChild(n))
            })
        }(window)
    }, function (e, t, n) {
        "use strict";
        n.r(t);

        function l(e, t) {
            if (e.parent = t, e.children)
                for (var n = 0; n < e.children.length; n++) l(e.children[n], e)
        }
        var i = n(2);
        document;

        function E(e, t, n, i) {
            var o = i - t,
                a = e - n,
                r = Math.atan(Math.abs(o) / Math.abs(a)) / 3.14 * 180;
            a < 0 && 0 < o && (r = 180 - r), a < 0 && o < 0 && (r = 180 + r), 0 < a && o < 0 && (r = 360 - r);
            var c = r + 30,
                d = r - 30;
            return {
                x1: n + 20 * Math.cos(Math.PI * c / 180),
                y1: i - 20 * Math.sin(Math.PI * c / 180),
                x2: n + 20 * Math.cos(Math.PI * d / 180),
                y2: i - 20 * Math.sin(Math.PI * d / 180)
            }
        }

        function S(e, t, n) {
            var i, o, a = (e.cy - n) / (t - e.cx);
            return o = a > e.h / e.w || a < -e.h / e.w ? e.cy - n < 0 ? (i = e.cx - e.h / 2 / a, e.cy + e.h / 2) : (i = e.cx + e.h / 2 / a, e.cy - e.h / 2) : e.cx - t < 0 ? (i = e.cx + e.w / 2, e.cy - e.w * a / 2) : (i = e.cx - e.w / 2, e.cy + e.w * a / 2), {
                x: i,
                y: o
            }
        }

        function M(e, t, n) {
            var i, o, a = (e.cy - n) / (t - e.cx);
            return o = a > e.h / e.w || a < -e.h / e.w ? e.cy - n < 0 ? (i = e.cx - e.h / 2 / a, e.cy + e.h / 2) : (i = e.cx + e.h / 2 / a, e.cy - e.h / 2) : e.cx - t < 0 ? (i = e.cx + e.w / 2, e.cy - e.w * a / 2) : (i = e.cx - e.w / 2, e.cy + e.w * a / 2), {
                x: i,
                y: o
            }
        }

        function j() {
            return ((new Date).getTime().toString(16) + Math.random().toString(16).substr(2)).substr(2, 16)
        }

        function p() {
            return {
                topic: "new node",
                id: j()
            }
        }

        function s(e) {
            var t = e.parent.children,
                n = t.indexOf(e);
            return t.splice(n, 1), t.length
        }
        var o = {
            afterMoving: !1,
            mousedown: !1,
            lastX: null,
            lastY: null,
            onMove: function (e, t) {
                if (this.mousedown) {
                    if (this.afterMoving = !0, !this.lastX) return this.lastX = e.pageX, void(this.lastY = e.pageY);
                    var n = this.lastX - e.pageX,
                        i = this.lastY - e.pageY;
                    t.scrollTo(t.scrollLeft + n, t.scrollTop + i), this.lastX = e.pageX, this.lastY = e.pageY
                }
            },
            clear: function () {
                this.afterMoving = !1, this.mousedown = !1, this.lastX = null, this.lastY = null
            }
        };

        function m(e) {
            this.dom = e, this.mousedown = !1, this.lastX = null, this.lastY = null
        }
        m.prototype.init = function (e, i) {
            var o = this;
            this.handleMouseMove = function (e) {
                if (e.stopPropagation(), o.mousedown) {
                    if (!o.lastX) return o.lastX = e.pageX, void(o.lastY = e.pageY);
                    var t = o.lastX - e.pageX,
                        n = o.lastY - e.pageY;
                    i(t, n), o.lastX = e.pageX, o.lastY = e.pageY
                }
            }, this.handleMouseDown = function (e) {
                e.stopPropagation(), o.mousedown = !0
            }, this.handleClear = function (e) {
                e.stopPropagation(), o.clear()
            }, e.addEventListener("mousemove", this.handleMouseMove), e.addEventListener("mouseleave", this.handleClear), e.addEventListener("mouseup", this.handleClear), this.dom.addEventListener("mousedown", this.handleMouseDown)
        }, m.prototype.destory = function (e) {
            e.removeEventListener("mousemove", this.handleMouseMove), e.removeEventListener("mouseleave", this.handleClear), e.removeEventListener("mouseup", this.handleClear), this.dom.removeEventListener("mousedown", this.handleMouseDown)
        }, m.prototype.clear = function () {
            this.mousedown = !1, this.lastX = null, this.lastY = null
        };

        function O(e) {
            return b.querySelector("[data-nodeid=me".concat(e, "]"))
        }

        function h(e) {
            var t = b.createElement("GRP"),
                n = g(e);
            if (t.appendChild(n), e.children && 0 < e.children.length && (n.appendChild(v(e.expanded)), !1 !== e.expanded)) {
                var i = x(e.children);
                t.appendChild(i)
            }
            return {
                grp: t,
                top: n
            }
        }
        var u = 0,
            f = 1,
            D = 2,
            b = document,
            g = function (e) {
                var t = b.createElement("t"),
                    n = a(e);
                if (e.style && (n.style.color = e.style.color, n.style.background = e.style.background, n.style.fontSize = e.style.fontSize + "px", n.style.fontWeight = e.style.fontWeight || "normal"), e.icons) {
                    var i = b.createElement("span");
                    i.className = "icons", i.innerHTML = e.icons.map(function (e) {
                        return "<span>".concat(e, "</span>")
                    }).join(""), n.appendChild(i)
                }
                if (e.tags) {
                    var o = b.createElement("div");
                    o.className = "tags", o.innerHTML = e.tags.map(function (e) {
                        return "<span>".concat(e, "</span>")
                    }).join(""), n.appendChild(o)
                }
                return t.appendChild(n), t
            },
            a = function (e) {
                var t = b.createElement("tpc");
                return t.nodeObj = e, t.innerHTML = e.topic, t.dataset.nodeid = "me" + e.id, t.draggable = window.mevar_draggable, t
            };
        var v = function (e) {
            var t = b.createElement("epd");
            return t.innerHTML = !1 !== e ? "-" : "+", t.expanded = !1 !== e, t.className = !1 !== e ? "minus" : "", t
        };

        function x(e, t, n) {
            var i = b.createElement("children");
            t && (i = t);
            for (var o = 0; o < e.length; o++) {
                var a = e[o],
                    r = b.createElement("GRP");
                t && (n === u ? r.className = "lhs" : n === f ? r.className = "rhs" : n === D && (a.direction === u ? r.className = "lhs" : a.direction === f && (r.className = "rhs")));
                var c = g(a);
                if (a.children && 0 < a.children.length) {
                    if (c.appendChild(v(a.expanded)), r.appendChild(c), !1 !== a.expanded) {
                        var d = x(a.children);
                        r.appendChild(d)
                    }
                } else r.appendChild(c);
                i.appendChild(r)
            }
            return i
        }

        function A(e) {
            var t = T.createElementNS("http://www.w3.org/2000/svg", "svg");
            return t.setAttribute("class", e), t
        }

        function r(e, t, n, i) {
            var o = T.createElementNS("http://www.w3.org/2000/svg", "line");
            return o.setAttribute("x1", e), o.setAttribute("y1", t), o.setAttribute("x2", n), o.setAttribute("y2", i), o.setAttribute("stroke", "#bbb"), o.setAttribute("fill", "none"), o.setAttribute("stroke-width", "2"), o
        }
        var T = document,
            y = document;

        function c(e, t) {
            var n = document.createElement("span");
            return n.id = e, n.innerHTML = '<svg class="icon" aria-hidden="true">\n    <use xlink:href="#icon-'.concat(t, '"></use>\n  </svg>'), n
        }
        var w = {
                cn: {
                    addChild: "插入子节点",
                    addSibling: "插入同级节点",
                    removeNode: "删除节点",
                    focus: "专注",
                    cancelFocus: "取消专注",
                    moveUp: "上移",
                    moveDown: "下移",
                    link: "连接",
                    font: "文字",
                    background: "背景",
                    tag: "标签",
                    icon: "图标",
                    tagsSeparate: "多个标签半角逗号分隔",
                    iconsSeparate: "多个图标半角逗号分隔"
                },
                en: {
                    addChild: "Add a child",
                    addSibling: "Add a sibling",
                    removeNode: "Remove node",
                    focus: "Focus Mode",
                    cancelFocus: "Cancel Focus Mode",
                    moveUp: "Move up",
                    moveDown: "Move down",
                    link: "Link",
                    font: "Font",
                    background: "Background",
                    tag: "Tag",
                    icon: "Icon",
                    tagsSeparate: "Separate tags by comma",
                    iconsSeparate: "Separate icons by comma"
                },
                ja: {
                    addChild: "子ノードを追加する",
                    addSibling: "兄弟ノードを追加する",
                    removeNode: "ノードを削除",
                    focus: "集中",
                    cancelFocus: "集中解除",
                    moveUp: "上へ移動",
                    moveDown: "下へ移動",
                    link: "コネクト",
                    font: "フォント",
                    background: "バックグラウンド",
                    tag: "タグ",
                    icon: "アイコン",
                    tagsSeparate: "複数タグはカンマ区切り",
                    iconsSeparate: "複数アイコンはカンマ区切り"
                }
            },
            d = document.createElement("toolbar"),
            N = c("fullscreen", "full"),
            k = c("toCenter", "living"),
            C = c("zoomout", "move"),
            L = c("zoomin", "add");
        document.createElement("span").innerHTML = "100%", d.appendChild(N), d.appendChild(k), d.appendChild(C), d.appendChild(L), d.className = "rb";
        var P = document.createElement("toolbar"),
            z = c("tbltl", "left"),
            I = c("tbltr", "right"),
            B = c("tblts", "side");
        P.appendChild(z), P.appendChild(I), P.appendChild(B), P.className = "lt";
        var H = "undefined" != typeof navigator && 0 < navigator.userAgent.toLowerCase().indexOf("firefox");

        function R(e, t, n) {
            e.addEventListener ? e.addEventListener(t, n, !1) : e.attachEvent && e.attachEvent("on".concat(t), function () {
                n(window.event)
            })
        }

        function q(e, t) {
            for (var n = t.slice(0, t.length - 1), i = 0; i < n.length; i++) n[i] = e[n[i].toLowerCase()];
            return n
        }

        function U(e) {
            for (var t = (e = (e = e || "").replace(/\s/g, "")).split(","), n = t.lastIndexOf(""); 0 <= n;) t[n - 1] += ",", t.splice(n, 1), n = t.lastIndexOf("");
            return t
        }

        function _(e, t) {
            for (var n = e.length >= t.length ? e : t, i = e.length >= t.length ? t : e, o = !0, a = 0; a < n.length; a++) - 1 === i.indexOf(n[a]) && (o = !1);
            return o
        }
        for (var V = {
                backspace: 8,
                tab: 9,
                clear: 12,
                enter: 13,
                return: 13,
                esc: 27,
                escape: 27,
                space: 32,
                left: 37,
                up: 38,
                right: 39,
                down: 40,
                del: 46,
                delete: 46,
                ins: 45,
                insert: 45,
                home: 36,
                end: 35,
                pageup: 33,
                pagedown: 34,
                capslock: 20,
                "⇪": 20,
                ",": 188,
                ".": 190,
                "/": 191,
                "`": 192,
                "-": H ? 173 : 189,
                "=": H ? 61 : 187,
                ";": H ? 59 : 186,
                "'": 222,
                "[": 219,
                "]": 221,
                "\\": 220
            }, W = {
                "⇧": 16,
                shift: 16,
                "⌥": 18,
                alt: 18,
                option: 18,
                "⌃": 17,
                ctrl: 17,
                control: 17,
                "⌘": H ? 224 : 91,
                cmd: H ? 224 : 91,
                command: H ? 224 : 91
            }, F = {
                16: "shiftKey",
                18: "altKey",
                17: "ctrlKey"
            }, X = {
                16: !1,
                18: !1,
                17: !1
            }, Y = {}, G = 1; G < 20; G++) V["f".concat(G)] = 111 + G;
        F[H ? 224 : 91] = "metaKey", X[H ? 224 : 91] = !1;
        var J = [],
            K = "all",
            $ = [],
            Z = function (e) {
                return V[e.toLowerCase()] || W[e.toLowerCase()] || e.toUpperCase().charCodeAt(0)
            };

        function Q(e) {
            K = e || "all"
        }

        function ee() {
            return K || "all"
        }

        function te(e, t, n) {
            var i;
            if (t.scope === n || "all" === t.scope) {
                for (var o in i = 0 < t.mods.length, X) Object.prototype.hasOwnProperty.call(X, o) && (!X[o] && -1 < t.mods.indexOf(+o) || X[o] && -1 === t.mods.indexOf(+o)) && (i = !1);
                (0 !== t.mods.length || X[16] || X[18] || X[17] || X[91]) && !i && "*" !== t.shortcut || !1 === t.method(e, t) && (e.preventDefault ? e.preventDefault() : e.returnValue = !1, e.stopPropagation && e.stopPropagation(), e.cancelBubble && (e.cancelBubble = !0))
            }
        }

        function ne(e) {
            var t = Y["*"],
                n = e.keyCode || e.which || e.charCode;
            if (ie.filter.call(this, e)) {
                if (-1 === J.indexOf(n) && 229 !== n && J.push(n), 93 !== n && 224 !== n || (n = 91), n in X) {
                    for (var i in X[n] = !0, W) W[i] === n && (ie[i] = !0);
                    if (!t) return
                }
                for (var o in X) Object.prototype.hasOwnProperty.call(X, o) && (X[o] = e[F[o]]);
                var a = ee();
                if (t)
                    for (var r = 0; r < t.length; r++) t[r].scope === a && ("keydown" === e.type && t[r].keydown || "keyup" === e.type && t[r].keyup) && te(e, t[r], a);
                if (n in Y)
                    for (var c = 0; c < Y[n].length; c++)
                        if (("keydown" === e.type && Y[n][c].keydown || "keyup" === e.type && Y[n][c].keyup) && Y[n][c].key) {
                            for (var d = Y[n][c].key.split("+"), s = [], l = 0; l < d.length; l++) s.push(Z(d[l]));
                            (s = s.sort()).join("") === J.sort().join("") && te(e, Y[n][c], a)
                        }
            }
        }

        function ie(e, t, n) {
            var i = U(e),
                o = [],
                a = "all",
                r = document,
                c = 0,
                d = !1,
                s = !0;
            for (void 0 === n && "function" == typeof t && (n = t), "[object Object]" === Object.prototype.toString.call(t) && (t.scope && (a = t.scope), t.element && (r = t.element), t.keyup && (d = t.keyup), t.keydown && (s = t.keydown)), "string" == typeof t && (a = t); c < i.length; c++) o = [], 1 < (e = i[c].split("+")).length && (o = q(W, e)), (e = "*" === (e = e[e.length - 1]) ? "*" : Z(e)) in Y || (Y[e] = []), Y[e].push({
                keyup: d,
                keydown: s,
                scope: a,
                mods: o,
                shortcut: i[c],
                method: n,
                key: i[c]
            });
            void 0 !== r && ! function (e) {
                return -1 < $.indexOf(e)
            }(r) && window && ($.push(r), R(r, "keydown", function (e) {
                ne(e)
            }), R(window, "focus", function () {
                J = []
            }), R(r, "keyup", function (e) {
                ne(e),
                    function (e) {
                        var t = e.keyCode || e.which || e.charCode,
                            n = J.indexOf(t);
                        if (0 <= n && J.splice(n, 1), e.key && "meta" === e.key.toLowerCase() && J.splice(0, J.length), 93 !== t && 224 !== t || (t = 91), t in X)
                            for (var i in X[t] = !1, W) W[i] === t && (ie[i] = !1)
                    }(e)
            }))
        }
        var oe = {
            setScope: Q,
            getScope: ee,
            deleteScope: function (e, t) {
                var n, i;
                for (var o in e = e || ee(), Y)
                    if (Object.prototype.hasOwnProperty.call(Y, o))
                        for (n = Y[o], i = 0; i < n.length;) n[i].scope === e ? n.splice(i, 1) : i++;
                ee() === e && Q(t || "all")
            },
            getPressedKeyCodes: function () {
                return J.slice(0)
            },
            isPressed: function (e) {
                return "string" == typeof e && (e = Z(e)), -1 !== J.indexOf(e)
            },
            filter: function (e) {
                var t = e.target || e.srcElement,
                    n = t.tagName,
                    i = !0;
                return !t.isContentEditable && "TEXTAREA" !== n && ("INPUT" !== n && "TEXTAREA" !== n || t.readOnly) || (i = !1), i
            },
            unbind: function (e, t, n) {
                var i, o, a = U(e),
                    r = [];
                "function" == typeof t && (n = t, t = "all");
                for (var c = 0; c < a.length; c++) {
                    if (r = 1 < (i = a[c].split("+")).length ? q(W, i) : [], e = "*" === (e = i[i.length - 1]) ? "*" : Z(e), t = t || ee(), !Y[e]) return;
                    for (var d = 0; d < Y[e].length; d++) {
                        o = Y[e][d], n && o.method !== n || o.scope !== t || !_(o.mods, r) || (Y[e][d] = {})
                    }
                }
            }
        };
        for (var ae in oe) Object.prototype.hasOwnProperty.call(oe, ae) && (ie[ae] = oe[ae]);
        if ("undefined" != typeof window) {
            var re = window.hotkeys;
            ie.noConflict = function (e) {
                return e && window.hotkeys === ie && (window.hotkeys = re), ie
            }, window.hotkeys = ie
        }
        var ce = ie;

        function de() {
            this.handlers = {}
        }
        de.prototype = {
            showHandler: function () {},
            addListener: function (e, t) {
                void 0 === this.handlers[e] && (this.handlers[e] = []), this.handlers[e].push(t)
            },
            fire: function (e, t) {
                if (this.handlers[e] instanceof Array)
                    for (var n = this.handlers[e], i = 0; i < n.length; i++) n[i](t)
            },
            removeListener: function (e, t) {
                if (this.handlers[e]) {
                    var n = this.handlers[e];
                    if (null == t) n.length = 0;
                    else if (n.length)
                        for (var i = 0; i < n.length; i++) n[i] == t && this.handlers[e].splice(i, 1)
                }
            }
        };
        n(3), n(6), n(8), n(10), n(12);
        n.d(t, "E", function () {
            return se
        });
        var se = window.E = O,
            le = document;

        function pe(e) {
            var t = this,
                n = e.el,
                i = e.data,
                o = e.direction,
                a = e.locale,
                r = e.draggable,
                c = e.editable,
                d = e.contextMenu,
                s = e.contextMenuOption,
                l = e.toolBar,
                p = e.nodeMenu,
                h = e.keypress;
            this.mindElixirBox = document.querySelector(n), this.history = [], this.nodeData = i.nodeData || {}, this.linkData = i.linkData || {}, this.locale = a, this.nodeDataBackup = this.nodeData, this.contextMenuOption = s, this.contextMenu = void 0 === d || d, this.toolBar = void 0 === l || l, this.nodeMenu = void 0 === p || p, this.keypress = void 0 === h || h, this.direction = "number" == typeof o ? o : 1, window.mevar_draggable = void 0 === r || r, this.editable = void 0 === c || c, this.parentMap = {}, this.currentNode = null, this.currentLink = null, this.inputDiv = null, this.bus = new de, this.scaleVal = 1, this.tempDir = null, this.isUndo = !1, this.bus.addListener("operation", function (e) {
                t.isUndo ? t.isUndo = !1 : ["moveNode", "removeNode", "addChild", "finishEdit"].includes(e.name) && t.history.push(e)
            }), this.undo = function () {
                var e = this.history.pop();
                e && (this.isUndo = !0, "moveNode" === e.name ? this.moveNode(se(e.obj.fromObj.id), se(e.obj.originParentId)) : "removeNode" === e.name ? e.originSiblingId ? this.insertBefore(se(e.originSiblingId), e.obj) : this.addChild(se(e.originParentId), e.obj) : "addChild" === e.name ? this.removeNode(se(e.obj.id)) : "finishEdit" === e.name ? this.setNodeTopic(se(e.obj.id), e.origin) : this.isUndo = !1)
            }
        }
        pe.prototype = {
            addParentLink: l,
            insertSibling: function (e, t) {
                var n = e || this.currentNode;
                if (n) {
                    var i = n.nodeObj;
                    if (!0 !== i.root) {
                        var o = t || p();
                        ! function (e, t) {
                            var n = e.parent.children,
                                i = n.indexOf(e);
                            n.splice(i + 1, 0, t)
                        }(i, o), l(this.nodeData);
                        var a = n.parentElement,
                            r = h(o),
                            c = r.grp,
                            d = r.top,
                            s = a.parentNode.parentNode;
                        s.insertBefore(c, a.parentNode.nextSibling), "box" === s.className ? (this.processPrimaryNode(c, o), this.linkDiv()) : this.linkDiv(c.offsetParent), t || this.createInputDiv(d.children[0]), this.selectNode(d.children[0]), d.scrollIntoViewIfNeeded(), this.bus.fire("operation", {
                            name: "insertSibling",
                            obj: o
                        })
                    } else this.addChild()
                }
            },
            insertBefore: function (e, t) {
                var n = e || this.currentNode;
                if (n) {
                    var i = n.nodeObj;
                    if (!0 !== i.root) {
                        var o = t || p();
                        ! function (e, t) {
                            var n = e.parent.children,
                                i = n.indexOf(e);
                            n.splice(i, 0, t)
                        }(i, o), l(this.nodeData);
                        var a = n.parentElement,
                            r = h(o),
                            c = r.grp,
                            d = r.top,
                            s = a.parentNode.parentNode;
                        s.insertBefore(c, a.parentNode), "box" === s.className ? (this.processPrimaryNode(c, o), this.linkDiv()) : this.linkDiv(c.offsetParent), t || this.createInputDiv(d.children[0]), this.selectNode(d.children[0]), d.scrollIntoViewIfNeeded(), this.bus.fire("operation", {
                            name: "insertSibling",
                            obj: o
                        })
                    } else this.addChild()
                }
            },
            addChild: function (e, t) {
                var n = e || this.currentNode;
                if (n) {
                    var i = n.nodeObj;
                    if (!1 !== i.expanded) {
                        var o = t || p();
                        i.expanded = !0, i.children ? i.children.push(o) : i.children = [o], l(this.nodeData);
                        var a = n.parentElement,
                            r = h(o),
                            c = r.grp,
                            d = r.top;
                        if ("T" === a.tagName) {
                            if (a.children[1]) a.nextSibling.appendChild(c);
                            else {
                                var s = y.createElement("children");
                                s.appendChild(c), a.appendChild(v(!0)), a.parentElement.insertBefore(s, a.nextSibling)
                            }
                            this.linkDiv(c.offsetParent)
                        } else "ROOT" === a.tagName && (this.processPrimaryNode(c, o), a.nextSibling.appendChild(c), this.linkDiv());
                        t || this.createInputDiv(d.children[0]), this.selectNode(d.children[0]), d.scrollIntoViewIfNeeded(), this.bus.fire("operation", {
                            name: "addChild",
                            obj: o
                        })
                    }
                }
            },
            removeNode: function (e) {
                var t = e || this.currentNode;
                if (t) {
                    var n = t.nodeObj.parent.children.findIndex(function (e) {
                            return e === t.nodeObj
                        }),
                        i = t.nodeObj.parent.children[n + 1],
                        o = i && i.id;
                    this.bus.fire("operation", {
                        name: "removeNode",
                        obj: t.nodeObj,
                        originSiblingId: o,
                        originParentId: t.nodeObj.parent.id
                    });
                    var a = s(t.nodeObj);
                    if ("T" === (t = t.parentNode).tagName) {
                        if (0 === a) {
                            var r = t.parentNode.parentNode.previousSibling;
                            "ROOT" !== r.tagName && r.children[1].remove(), this.selectParent()
                        } else {
                            this.selectPrevSibling() || this.selectNextSibling()
                        }
                        for (var c in this.linkData) {
                            var d = this.linkData[c];
                            d.from !== t.firstChild && d.to !== t.firstChild || this.removeLink(document.querySelector("[data-linkid=".concat(this.linkData[c].id, "]")))
                        }
                        t.parentNode.remove()
                    }
                    this.linkDiv()
                }
            },
            moveNode: function (e, t) {
                var n = e.nodeObj,
                    i = t.nodeObj,
                    o = n.parent.id;
                if (!1 !== i.expanded && function (e, t) {
                        for (var n = !0; t.parent;) {
                            if (t.parent === e) {
                                n = !1;
                                break
                            }
                            t = t.parent
                        }
                        return n
                    }(n, i)) {
                    ! function (e, t) {
                        s(e), t.children ? t.children.push(e) : t.children = [e]
                    }(n, i), l(this.nodeData);
                    var a = e.parentElement,
                        r = t.parentElement;
                    if ("box" === a.parentNode.parentNode.className ? a.parentNode.lastChild.remove() : "box" === a.parentNode.className && (a.style.cssText = ""), "T" === r.tagName)
                        if ("box" === a.parentNode.parentNode.className && (a.parentNode.className = ""), r.children[1]) r.nextSibling.appendChild(a.parentNode);
                        else {
                            var c = y.createElement("children");
                            c.appendChild(a.parentNode), r.appendChild(v(!0)), r.parentElement.insertBefore(c, r.nextSibling)
                        }
                    else "ROOT" === r.tagName && (this.processPrimaryNode(a.parentNode, n), r.nextSibling.appendChild(a.parentNode));
                    this.linkDiv(), this.bus.fire("operation", {
                        name: "moveNode",
                        obj: {
                            fromObj: n,
                            toObj: i,
                            originParentId: o
                        }
                    })
                }
            },
            moveUpNode: function (e) {
                var t = e || this.currentNode;
                if (t) {
                    var n = t.parentNode.parentNode;
                    ! function (e) {
                        var t = e.parent.children,
                            n = t.indexOf(e),
                            i = t[n];
                        0 === n ? (t[n] = t[t.length - 1], t[t.length - 1] = i) : (t[n] = t[n - 1], t[n - 1] = i), i = null
                    }(t.nodeObj), n.parentNode.insertBefore(n, n.previousSibling), this.linkDiv(), t.scrollIntoViewIfNeeded()
                }
            },
            moveDownNode: function (e) {
                var t = e || this.currentNode;
                if (t) {
                    var n = t.parentNode.parentNode;
                    ! function (e) {
                        var t = e.parent.children,
                            n = t.indexOf(e),
                            i = t[n];
                        n === t.length - 1 ? (t[n] = t[0], t[0] = i) : (t[n] = t[n + 1], t[n + 1] = i), i = null
                    }(t.nodeObj), n.nextSibling ? n.parentNode.insertBefore(n, n.nextSibling.nextSibling) : n.parentNode.prepend(n), this.linkDiv(), t.scrollIntoViewIfNeeded()
                }
            },
            beginEdit: function (e) {
                var t = e || this.currentNode;
                t && this.createInputDiv(t)
            },
            updateNodeStyle: function (e) {
                if (e.style) {
                    var t = O(e.id);
                    t.style.color = e.style.color, t.style.background = e.style.background, t.style.fontSize = e.style.fontSize + "px", t.style.fontWeight = e.style.fontWeight || "normal", this.linkDiv()
                }
            },
            updateNodeTags: function (e) {
                if (e.tags) {
                    var t = O(e.id),
                        n = e.tags,
                        i = t.querySelector(".tags");
                    if (i) i.innerHTML = n.map(function (e) {
                        return "<span>".concat(e, "</span>")
                    }).join("");
                    else {
                        var o = y.createElement("div");
                        o.className = "tags", o.innerHTML = n.map(function (e) {
                            return "<span>".concat(e, "</span>")
                        }).join(""), t.appendChild(o)
                    }
                    this.linkDiv()
                }
            },
            updateNodeIcons: function (e) {
                if (e.icons) {
                    var t = O(e.id),
                        n = e.icons,
                        i = t.querySelector(".icons");
                    if (i) i.innerHTML = n.map(function (e) {
                        return "<span>".concat(e, "</span>")
                    }).join("");
                    else {
                        var o = y.createElement("span");
                        o.className = "icons", o.innerHTML = n.map(function (e) {
                            return "<span>".concat(e, "</span>")
                        }).join(""), "tags" === t.lastChild.className ? t.insertBefore(o, t.lastChild) : t.appendChild(o)
                    }
                    this.linkDiv()
                }
            },
            createLink: function (e, t, n, i) {
                var o = this.map.getBoundingClientRect();
                if (e && t) {
                    var a, r, c, d, s = e.getBoundingClientRect(),
                        l = t.getBoundingClientRect(),
                        p = (s.x + s.width / 2 - o.x) / this.scaleVal,
                        h = (s.y + s.height / 2 - o.y) / this.scaleVal,
                        u = (l.x + l.width / 2 - o.x) / this.scaleVal,
                        f = (l.y + l.height / 2 - o.y) / this.scaleVal;
                    d = n ? (a = p + i.delta1.x, r = h + i.delta1.y, c = u + i.delta2.x, f + i.delta2.y) : (h + f) / 2 - h <= s.height / 2 ? (a = (s.x + s.width - o.x) / this.scaleVal + 100, r = h, c = (l.x + l.width - o.x) / this.scaleVal + 100, f) : (c = a = (p + u) / 2, r = (h + f) / 2);
                    var m, b = {
                            cx: p,
                            cy: h,
                            w: s.width,
                            h: s.height
                        },
                        g = {
                            cx: u,
                            cy: f,
                            w: l.width,
                            h: l.height
                        },
                        v = S(b, a, r),
                        x = v.x,
                        y = v.y,
                        w = M(g, c, d),
                        N = w.x,
                        k = w.y,
                        C = E(c, d, N, k),
                        L = function (e, t) {
                            var n = T.createElementNS("http://www.w3.org/2000/svg", "g"),
                                i = T.createElementNS("http://www.w3.org/2000/svg", "path"),
                                o = T.createElementNS("http://www.w3.org/2000/svg", "path");
                            return o.setAttribute("d", t), o.setAttribute("stroke", "rgb(235, 95, 82)"), o.setAttribute("fill", "none"), o.setAttribute("stroke-linecap", "cap"), o.setAttribute("stroke-width", "2"), i.setAttribute("d", e), i.setAttribute("stroke", "rgb(235, 95, 82)"), i.setAttribute("fill", "none"), i.setAttribute("stroke-linecap", "cap"), i.setAttribute("stroke-width", "2"), n.appendChild(i), n.appendChild(o), n
                        }("M ".concat(x, " ").concat(y, " C ").concat(a, " ").concat(r, " ").concat(c, " ").concat(d, " ").concat(N, " ").concat(k), "M ".concat(C.x1, " ").concat(C.y1, " L ").concat(N, " ").concat(k, " L ").concat(C.x2, " ").concat(C.y2));
                    n ? (m = {
                        id: i.id,
                        label: "",
                        from: e,
                        to: t,
                        delta1: {
                            x: a - p,
                            y: r - h
                        },
                        delta2: {
                            x: c - u,
                            y: d - f
                        }
                    }, this.linkData[i.id] = m, L.linkObj = m, L.dataset.linkid = i.id) : (m = {
                        id: j(),
                        label: "",
                        from: e,
                        to: t,
                        delta1: {
                            x: a - p,
                            y: r - h
                        },
                        delta2: {
                            x: c - u,
                            y: d - f
                        }
                    }, this.linkData[m.id] = m, L.linkObj = m, L.dataset.linkid = m.id, this.currentLink = L), this.linkSvgGroup.appendChild(L), n || this.showLinkController(a, r, c, d, m, b, g)
                }
            },
            removeLink: function (e) {
                var t;
                if (t = e || this.currentLink) {
                    this.hideLinkController();
                    var n = t.linkObj.id;
                    delete this.linkData[n], t.remove(), t = null
                }
            },
            selectLink: function (e) {
                var t = (this.currentLink = e).linkObj,
                    n = t.from,
                    i = t.to,
                    o = this.map.getBoundingClientRect(),
                    a = n.getBoundingClientRect(),
                    r = i.getBoundingClientRect(),
                    c = (a.x + a.width / 2 - o.x) / this.scaleVal,
                    d = (a.y + a.height / 2 - o.y) / this.scaleVal,
                    s = (r.x + r.width / 2 - o.x) / this.scaleVal,
                    l = (r.y + r.height / 2 - o.y) / this.scaleVal,
                    p = {
                        cx: c,
                        cy: d,
                        w: a.width,
                        h: a.height
                    },
                    h = {
                        cx: s,
                        cy: l,
                        w: r.width,
                        h: r.height
                    },
                    u = c + t.delta1.x,
                    f = d + t.delta1.y,
                    m = s + t.delta2.x,
                    b = l + t.delta2.y;
                this.showLinkController(u, f, m, b, t, p, h)
            },
            hideLinkController: function () {
                this.linkController.style.display = "none", this.P2.style.display = "none", this.P3.style.display = "none"
            },
            showLinkController: function (o, a, r, c, d, i, s) {
                var l = this;
                this.linkController.style.display = "initial", this.P2.style.display = "initial", this.P3.style.display = "initial";
                var e = S(i, o, a),
                    p = e.x,
                    h = e.y,
                    t = M(s, r, c),
                    u = t.x,
                    f = t.y;
                this.P2.style.cssText = "top:".concat(a, "px;left:").concat(o, "px;"), this.P3.style.cssText = "top:".concat(c, "px;left:").concat(r, "px;"), this.line1.setAttribute("x1", p), this.line1.setAttribute("y1", h), this.line1.setAttribute("x2", o), this.line1.setAttribute("y2", a), this.line2.setAttribute("x1", r), this.line2.setAttribute("y1", c), this.line2.setAttribute("x2", u), this.line2.setAttribute("y2", f), this.helper1 && (this.helper1.destory(this.map), this.helper2.destory(this.map)), this.helper1 = new m(this.P2), this.helper2 = new m(this.P3), this.helper1.init(this.map, function (e, t) {
                    o -= e / l.scaleVal, a -= t / l.scaleVal;
                    var n = S(i, o, a);
                    p = n.x, h = n.y, l.P2.style.top = a + "px", l.P2.style.left = o + "px", l.currentLink.children[0].setAttribute("d", "M ".concat(p, " ").concat(h, " C ").concat(o, " ").concat(a, " ").concat(r, " ").concat(c, " ").concat(u, " ").concat(f)), l.line1.setAttribute("x1", p), l.line1.setAttribute("y1", h), l.line1.setAttribute("x2", o), l.line1.setAttribute("y2", a), d.delta1.x = o - i.cx, d.delta1.y = a - i.cy
                }), this.helper2.init(this.map, function (e, t) {
                    r -= e / l.scaleVal, c -= t / l.scaleVal;
                    var n = M(s, r, c);
                    u = n.x, f = n.y;
                    var i = E(r, c, u, f);
                    l.P3.style.top = c + "px", l.P3.style.left = r + "px", l.currentLink.children[0].setAttribute("d", "M ".concat(p, " ").concat(h, " C ").concat(o, " ").concat(a, " ").concat(r, " ").concat(c, " ").concat(u, " ").concat(f)), l.currentLink.children[1].setAttribute("d", "M ".concat(i.x1, " ").concat(i.y1, " L ").concat(u, " ").concat(f, " L ").concat(i.x2, " ").concat(i.y2)), l.line2.setAttribute("x1", r), l.line2.setAttribute("y1", c), l.line2.setAttribute("x2", u), l.line2.setAttribute("y2", f), d.delta2.x = r - s.cx, d.delta2.y = c - s.cy
                })
            },
            layout: function () {
                this.root.innerHTML = "", this.box.innerHTML = "";
                var e = a(this.nodeData);
                e.draggable = !1, this.root.appendChild(e);
                var t = this.nodeData.children;
                if (t && 0 !== t.length) {
                    if (this.direction === D) {
                        var n = 0,
                            i = 0;
                        t.map(function (e) {
                            void 0 === e.direction ? n <= i ? (e.direction = u, n += 1) : (e.direction = f, i += 1) : e.direction === u ? n += 1 : i += 1
                        })
                    }
                    x(this.nodeData.children, this.box, this.direction)
                }
            },
            linkDiv: function (e) {
                var t = this.root;
                t.style.cssText = "top:".concat(1e4 - t.offsetHeight / 2, "px;left:").concat(1e4 - t.offsetWidth / 2, "px;");
                var n = this.box.children;
                this.svg2nd.innerHTML = "";
                var i, o, a = 0,
                    r = 0,
                    c = 0,
                    d = 0,
                    s = 0,
                    l = 0;
                if (this.direction === D) {
                    for (var p = 0, h = 0, u = 0, f = 0, m = 0; m < n.length; m++) {
                        var b = n[m];
                        "lhs" === b.className ? (s += b.offsetHeight + 25, u += b.offsetHeight, p += 1) : (l += b.offsetHeight + 25, f += b.offsetHeight, h += 1)
                    }
                    r = l < s ? (o = 1e4 - Math.max(s) / 2, i = "r", (s - f) / (h - 1)) : (o = 1e4 - Math.max(l) / 2, i = "l", (l - u) / (p - 1))
                } else {
                    for (var g = 0; g < n.length; g++) {
                        a += n[g].offsetHeight + 25
                    }
                    o = 1e4 - a / 2
                }
                for (var v = "", x = 0; x < n.length; x++) {
                    var y = void 0,
                        w = void 0,
                        N = n[x],
                        k = N.offsetHeight,
                        C = void 0;
                    "lhs" === N.className ? (N.style.top = o + c + "px", N.style.left = 1e4 - t.offsetWidth / 2 - 65 - N.offsetWidth + "px", y = 1e4 - t.offsetWidth / 2 - 65 - 15, C = (w = o + c + k / 2) + (s - k) / 2 * .02, v += "M ".concat(1e4, " ", 1e4, " C 10000 10000 ", 10003.9, " ").concat(C, " ").concat(y, " ").concat(w), c += "l" === i ? k + r : k + 25) : (N.style.top = o + d + "px", N.style.left = 1e4 + t.offsetWidth / 2 + 65 + "px", y = 1e4 + t.offsetWidth / 2 + 65 + 15, C = (w = o + d + k / 2) + (l - k) / 2 * .02, v += "M ".concat(1e4, " ", 1e4, " C 10000 10000 ", 10003.9, " ").concat(C, " ").concat(y, " ").concat(w), d += "r" === i ? k + r : k + 25);
                    var L = N.children[0].children[1];
                    L && (L.style.top = (L.parentNode.offsetHeight - L.offsetHeight) / 2 + "px", "lhs" === N.className ? L.style.left = "-10px" : L.style.left = L.parentNode.offsetWidth - 10 + "px")
                }
                this.svg2nd.appendChild(function (e) {
                    var t = T.createElementNS("http://www.w3.org/2000/svg", "path");
                    return t.setAttribute("d", e), t.setAttribute("stroke", "#666"), t.setAttribute("fill", "none"), t.setAttribute("stroke-width", "2"), t
                }(v));
                for (var E = 0; E < n.length; E++) {
                    var S = n[E];
                    e && e !== n[E] || S.childElementCount && function () {
                        var e = A("svg3rd");
                        "svg" === S.lastChild.tagName && S.lastChild.remove(), S.appendChild(e);
                        var t, n, i = S.children[0],
                            o = S.children[1].children,
                            w = "";
                        ! function e(t, n, i) {
                            for (var o = n.offsetTop, a = n.offsetLeft, r = n.offsetWidth, c = n.offsetHeight, d = 0; d < t.length; d++) {
                                var s = t[d],
                                    l = s.children[0],
                                    p = l.offsetTop,
                                    h = l.offsetHeight,
                                    u = void 0;
                                u = i ? o + c / 2 : o + c;
                                var f = p + h,
                                    m = void 0,
                                    b = void 0,
                                    g = void 0,
                                    v = s.offsetParent.className;
                                "lhs" === v ? (m = a + 15, b = (g = a) - l.offsetWidth, w += p + h < o + c / 2 + 50 && o + c / 2 - 50 < p + h ? "M ".concat(m, " ").concat(u, " L ").concat(g, " ").concat(u, " L ").concat(g, " ").concat(f, " L ").concat(b, " ").concat(f) : o + c / 2 <= p + h ? "M ".concat(m, " ").concat(u, " \n            L ").concat(g, " ").concat(u, " \n            L ").concat(g, " ").concat(f - 8, " \n            A ").concat(8, " ").concat(8, " 0 0 1 \n            ").concat(g - 8, ",").concat(f, " \n            L ").concat(b, " ").concat(f) : "M ".concat(m, " ").concat(u, " \n            L ").concat(g, " ").concat(u, " \n            L ").concat(g, " ").concat(f + 8, " \n            A ").concat(8, " ").concat(8, " 0 0 0 \n            ").concat(g - 8, ",").concat(f, " \n            L ").concat(b, " ").concat(f)) : "rhs" === v && (m = a + r - 15, b = (g = a + r) + l.offsetWidth, w += p + h < o + c / 2 + 50 && o + c / 2 - 50 < p + h ? "M ".concat(m, " ").concat(u, " L ").concat(g, " ").concat(u, " L ").concat(g, " ").concat(f, " L ").concat(b, " ").concat(f) : o + c / 2 <= p + h ? "M ".concat(m, " ").concat(u, " \n            L ").concat(g, " ").concat(u, " \n            L ").concat(g, " ").concat(f - 8, " \n            A ").concat(8, " ").concat(8, " 0 0 0 ").concat(g + 8, ",").concat(f, " \n            L ").concat(b, " ").concat(f) : "M ".concat(m, " ").concat(u, " \n            L ").concat(g, " ").concat(u, " \n            L ").concat(g, " ").concat(f + 8, " \n            A ").concat(8, " ").concat(8, " 0 0 1 ").concat(g + 8, ",").concat(f, " \n            L ").concat(b, " ").concat(f));
                                var x = l.children[1];
                                if (x && (x.style.top = (l.offsetHeight - x.offsetHeight) / 2 + "px", "lhs" === v ? x.style.left = "-10px" : "rhs" === v && (x.style.left = l.offsetWidth - 10 + "px"), x.expanded)) {
                                    var y = s.children[1].children;
                                    0 < y.length && e(y, l)
                                }
                            }
                        }(o, i, !0), e.appendChild((t = w, (n = T.createElementNS("http://www.w3.org/2000/svg", "path")).setAttribute("d", t), n.setAttribute("stroke", "#555"), n.setAttribute("fill", "none"), n.setAttribute("stroke-linecap", "square"), n.setAttribute("stroke-width", "1"), n.setAttribute("transform", "translate(0.5,-0.5)"), n))
                    }()
                }
                for (var M in this.linkSvgGroup.innerHTML = "", this.linkData) {
                    var j = this.linkData[M];
                    "string" == typeof j.from ? this.createLink(O(j.from), O(j.to), !0, j) : this.createLink(O(j.from.nodeObj.id), O(j.to.nodeObj.id), !0, j)
                }
            },
            createInputDiv: function (n) {
                var i = this;
                if (n) {
                    var o = b.createElement("div"),
                        a = n.childNodes[0].textContent;
                    n.appendChild(o), o.innerHTML = a, o.contentEditable = !0, o.spellcheck = !1, o.style.cssText = "min-width:".concat(n.offsetWidth - 8, "px;"), this.direction === u && (o.style.right = 0), o.focus(),
                        function (e) {
                            if (b.selection) {
                                var t = b.body.createTextRange();
                                t.moveToElementText(e), t.select()
                            } else if (window.getSelection) {
                                var n = b.createRange();
                                n.selectNodeContents(e), window.getSelection().removeAllRanges(), window.getSelection().addRange(n)
                            }
                        }(o), this.inputDiv = o, this.bus.fire("operation", {
                            name: "beginEdit",
                            obj: n.nodeObj
                        }), o.addEventListener("keydown", function (e) {
                            var t = e.keyCode;
                            8 === t ? e.stopPropagation() : 13 !== t && 9 !== t || (e.preventDefault(), i.inputDiv.blur(), i.map.focus())
                        }), o.addEventListener("blur", function () {
                            if (o) {
                                var e = n.nodeObj,
                                    t = o.textContent.trim();
                                e.topic = "" === t ? a : t, o.remove(), i.inputDiv = o = null, i.bus.fire("operation", {
                                    name: "finishEdit",
                                    obj: e,
                                    origin: a
                                }), t !== a && (n.childNodes[0].textContent = e.topic, i.linkDiv())
                            }
                        })
                }
            },
            processPrimaryNode: function (e, t) {
                if (this.direction === u) e.className = "lhs";
                else if (this.direction === f) e.className = "rhs";
                else if (this.direction === D) {
                    y.querySelectorAll(".lhs").length <= y.querySelectorAll(".rhs").length ? (e.className = "lhs", t.direction = u) : (e.className = "rhs", t.direction = f)
                }
            },
            selectNode: function (e) {
                if ("string" == typeof e) return this.selectNode(findEle(e));
                this.currentNode && (this.currentNode.className = ""), e.className = "selected", this.currentNode = e, this.bus.fire("selectNode", e.nodeObj)
            },
            unselectNode: function () {
                this.currentNode && (this.currentNode.className = ""), this.currentNode = null, this.bus.fire("unselectNode")
            },
            selectNextSibling: function () {
                if (this.currentNode && "meroot" !== this.currentNode.dataset.nodeid) {
                    var e, t = this.currentNode.parentElement.parentElement.nextSibling,
                        n = this.currentNode.parentElement.parentElement;
                    if ("rhs" === n.className || "lhs" === n.className) {
                        var i = document.querySelectorAll("." + n.className),
                            o = Array.from(i).indexOf(n);
                        if (!(o + 1 < i.length)) return !1;
                        e = i[o + 1].firstChild.firstChild
                    } else {
                        if (!t) return !1;
                        e = t.firstChild.firstChild
                    }
                    return this.selectNode(e), e.scrollIntoViewIfNeeded(), !0
                }
            },
            selectPrevSibling: function () {
                if (this.currentNode && "meroot" !== this.currentNode.dataset.nodeid) {
                    var e, t = this.currentNode.parentElement.parentElement.previousSibling,
                        n = this.currentNode.parentElement.parentElement;
                    if ("rhs" === n.className || "lhs" === n.className) {
                        var i = document.querySelectorAll("." + n.className),
                            o = Array.from(i).indexOf(n);
                        if (!(0 <= o - 1)) return !1;
                        e = i[o - 1].firstChild.firstChild
                    } else {
                        if (!t) return !1;
                        e = t.firstChild.firstChild
                    }
                    return this.selectNode(e), e.scrollIntoViewIfNeeded(), !0
                }
            },
            selectFirstChild: function () {
                if (this.currentNode) {
                    var e = this.currentNode.parentElement.nextSibling;
                    if (e && e.firstChild) {
                        var t = e.firstChild.firstChild.firstChild;
                        this.selectNode(t), t.scrollIntoViewIfNeeded()
                    }
                }
            },
            selectParent: function () {
                if (this.currentNode && "meroot" !== this.currentNode.dataset.nodeid) {
                    var e = this.currentNode.parentElement.parentElement.parentElement.previousSibling;
                    if (e) {
                        var t = e.firstChild;
                        this.selectNode(t), t.scrollIntoViewIfNeeded()
                    }
                }
            },
            getAllDataString: function () {
                var e = {
                    nodeData: this.nodeData,
                    linkData: this.linkData
                };
                return JSON.stringify(e, function (e, t) {
                    if ("parent" !== e) return "from" === e ? t.nodeObj.id : "to" === e ? t.nodeObj.id : t
                })
            },
            getAllData: function () {
                var e = {
                    nodeData: this.nodeData,
                    linkData: this.linkData
                };
                return JSON.parse(JSON.stringify(e, function (e, t) {
                    if ("parent" !== e) return "from" === e ? t.nodeObj.id : "to" === e ? t.nodeObj.id : t
                }))
            },
            getAllDataMd: function () {
                var e = this.nodeData,
                    o = "# " + e.topic + "\n\n";
                return function e(t, n) {
                    for (var i = 0; i < t.length; i++) o += n <= 6 ? "".padStart(n, "#") + " " + t[i].topic + "\n\n" : "".padStart(n - 7, "\t") + "- " + t[i].topic + "\n", t[i].children && e(t[i].children, n + 1)
                }(e.children, 2), o
            },
            scale: function (e) {
                this.scaleVal = e, this.map.style.transform = "scale(" + e + ")"
            },
            toCenter: function () {
                this.container.scrollTo(1e4 - this.container.offsetWidth / 2, 1e4 - this.container.offsetHeight / 2)
            },
            focusNode: function (e) {
                e.nodeObj.root || (this.tempDir || (this.tempDir = this.direction), this.nodeData = e.nodeObj, this.nodeData.root = !0, this.initRight())
            },
            cancelFocus: function () {
                this.tempDir && (delete this.nodeData.root, this.nodeData = this.nodeDataBackup, this.direction = this.tempDir, this.tempDir = null, this.init())
            },
            initLeft: function () {
                this.direction = 0, this.init()
            },
            initRight: function () {
                this.direction = 1, this.init()
            },
            initSide: function () {
                this.direction = 2, this.init()
            },
            setLocale: function (e) {
                this.locale = e, this.init()
            },
            enableEdit: function () {
                this.editable = !0
            },
            disableEdit: function () {
                this.editable = !1
            },
            setNodeTopic: function (e, t) {
                e.childNodes[0].textContent = t, this.linkDiv()
            },
            expandNode: function (e, t) {
                var n = e.nodeObj;
                "boolean" == typeof t ? n.expanded = t : !1 !== n.expanded ? n.expanded = !1 : n.expanded = !0, this.layout(), this.linkDiv()
            },
            init: function () {
                l(this.nodeData), this.mindElixirBox.className += " mind-elixir", this.mindElixirBox.innerHTML = "", this.container = le.createElement("div"), this.container.className = "map-container", this.map = le.createElement("div"), this.map.className = "map-canvas", this.map.setAttribute("tabindex", "0"), this.container.appendChild(this.map), this.mindElixirBox.appendChild(this.container), this.root = le.createElement("root"), this.box = le.createElement("children"), this.box.className = "box", this.svg2nd = A("svg2nd"), this.linkController = A("linkcontroller"), this.P2 = le.createElement("div"), this.P3 = le.createElement("div"), this.P2.className = this.P3.className = "circle", this.line1 = r(0, 0, 0, 0), this.line2 = r(0, 0, 0, 0), this.linkController.appendChild(this.line1), this.linkController.appendChild(this.line2), this.linkSvgGroup = A("topiclinks"), this.map.appendChild(this.root), this.map.appendChild(this.box), this.map.appendChild(this.svg2nd), this.map.appendChild(this.linkController), this.map.appendChild(this.linkSvgGroup), this.map.appendChild(this.P2), this.map.appendChild(this.P3), this.contextMenu && function (o, i) {
                        function a(e, t, n) {
                            var i = document.createElement("li");
                            return i.id = e, i.innerHTML = "<span>".concat(t, "</span><span>").concat(n, "</span>"), i
                        }
                        var e = w[o.locale] ? o.locale : "en",
                            t = a("cm-add_child", w[e].addChild, "tab"),
                            n = a("cm-add_sibling", w[e].addSibling, "enter"),
                            r = a("cm-remove_child", w[e].removeNode, "delete"),
                            c = a("cm-fucus", w[e].focus, ""),
                            d = a("cm-unfucus", w[e].cancelFocus, ""),
                            s = a("cm-up", w[e].moveUp, "PgUp"),
                            l = a("cm-down", w[e].moveDown, "Pgdn"),
                            p = a("cm-down", w[e].link, ""),
                            h = document.createElement("ul");
                        if (h.className = "menu-list", h.appendChild(t), h.appendChild(n), h.appendChild(r), i && !i.focus || (h.appendChild(c), h.appendChild(d)), h.appendChild(s), h.appendChild(l), i && !i.link || h.appendChild(p), i && i.extend)
                            for (var u = function (e) {
                                    var t = i.extend[e],
                                        n = a(t.name, t.name, "");
                                    h.appendChild(n), n.onclick = function (e) {
                                        t.onclick(e)
                                    }
                                }, f = 0; f < i.extend.length; f++) u(f);
                        var m = document.createElement("cmenu");
                        m.appendChild(h), m.hidden = !0, o.container.append(m), o.container.oncontextmenu = function (e) {
                            e.preventDefault();
                            var t = e.target;
                            if ("TPC" === t.tagName) {
                                o.selectNode(t), m.hidden = !1;
                                var n = h.offsetHeight,
                                    i = h.offsetWidth;
                                n + e.clientY > window.innerHeight ? (h.style.top = "", h.style.bottom = "0px") : (h.style.bottom = "", h.style.top = e.clientY + 15 + "px"), i + e.clientX > window.innerWidth ? (h.style.left = "", h.style.right = "0px") : (h.style.right = "", h.style.left = e.clientX + 10 + "px")
                            }
                        }, o.container.onclick = function (e) {
                            m.hidden = !0
                        }, t.onclick = function (e) {
                            o.addChild()
                        }, n.onclick = function (e) {
                            o.insertSibling()
                        }, r.onclick = function (e) {
                            o.removeNode()
                        }, c.onclick = function (e) {
                            o.focusNode(o.currentNode)
                        }, d.onclick = function (e) {
                            o.cancelFocus()
                        }, s.onclick = function (e) {
                            o.moveUpNode()
                        }, l.onclick = function (e) {
                            o.moveDownNode()
                        }, p.onclick = function (e) {
                            var t = o.currentNode;
                            o.map.addEventListener("click", function (e) {
                                e.preventDefault(), "T" !== e.target.parentElement.nodeName && "ROOT" !== e.target.parentElement.nodeName || o.createLink(t, o.currentNode)
                            }, {
                                once: !0
                            })
                        }
                    }(this, this.contextMenuOption), this.toolBar && function (e) {
                        var t = 1;
                        e.container.append(d), e.container.append(P), N.onclick = function () {
                            e.container.requestFullscreen()
                        }, k.onclick = function () {
                            e.toCenter()
                        }, C.onclick = function () {
                            t < .6 || e.scale(t -= .2)
                        }, L.onclick = function () {
                            1.6 < t || e.scale(t += .2)
                        }, z.onclick = function () {
                            e.initLeft()
                        }, I.onclick = function () {
                            e.initRight()
                        }, B.onclick = function () {
                            e.initSide()
                        }
                    }(this), this.nodeMenu && function (n) {
                        function e(e, t) {
                            var n = document.createElement("div");
                            return n.id = e, n.innerHTML = "<span>".concat(t, "</span>"), n
                        }
                        var i, t = w[n.locale] ? n.locale : "en",
                            o = e("nm-style", "style"),
                            a = e("nm-tag", "tag"),
                            r = e("nm-icon", "icon");
                        o.innerHTML = '\n      <div class="nm-fontsize-container">\n        '.concat(["15", "24", "32"].map(function (e) {
                            return '<div class="size"  data-size="'.concat(e, '">\n        <svg class="icon" style="width: ').concat(e, "px;height: ").concat(e, 'px" aria-hidden="true">\n          <use xlink:href="#icon-a"></use>\n        </svg></div>')
                        }).join(""), '<div class="bold"><svg class="icon" aria-hidden="true">\n  <use xlink:href="#icon-B"></use>\n  </svg></div>\n      </div>\n      <div class="nm-fontcolor-container">\n        ').concat(["#2c3e50", "#34495e", "#7f8c8d", "#94a5a6", "#bdc3c7", "#ecf0f1", "#8e44ad", "#9b59b6", "#2980b9", "#3298db", "#c0392c", "#e74c3c", "#d35400", "#f39c11", "#f1c40e", "#17a085", "#27ae61", "#2ecc71"].map(function (e) {
                            return '<div class="split6"><div class="palette" data-color="'.concat(e, '" style="background-color: ').concat(e, ';"></div></div>')
                        }).join(""), '\n      </div>\n      <div class="bof">\n      <span class="font">').concat(w[t].font, '</span>\n      <span class="background">').concat(w[t].background, "</span>\n      </div>\n  "), a.innerHTML = "\n      ".concat(w[t].tag, '<input class="nm-tag" tabindex="-1" placeholder="').concat(w[t].tagsSeparate, '" /><br>\n  '), r.innerHTML = "\n      ".concat(w[t].icon, '<input class="nm-icon" tabindex="-1" placeholder="').concat(w[t].iconsSeparate, '" /><br>\n  ');
                        var c = document.createElement("nmenu");

                        function d(e, t) {
                            var n = document.querySelectorAll(e);
                            [].forEach.call(n, function (e) {
                                e.classList.remove(t)
                            })
                        }
                        c.innerHTML = '\n  <div class="button-container"><svg class="icon" aria-hidden="true">\n  <use xlink:href="#icon-close"></use>\n  </svg></div>\n  ', c.appendChild(o), c.appendChild(a), c.appendChild(r), c.hidden = !0, n.container.append(c);
                        var s = c.querySelectorAll(".size"),
                            l = c.querySelector(".bold"),
                            p = c.querySelector(".button-container"),
                            h = c.querySelector(".font"),
                            u = document.querySelector(".nm-tag"),
                            f = document.querySelector(".nm-icon");
                        c.onclick = function (e) {
                            if (n.currentNode) {
                                var t = n.currentNode.nodeObj;
                                "palette" === e.target.className ? (t.style || (t.style = {}), d(".palette", "nmenu-selected"), e.target.className = "palette nmenu-selected", "font" === i ? t.style.color = e.target.dataset.color : "background" === i && (t.style.background = e.target.dataset.color), n.updateNodeStyle(t)) : "background" === e.target.className ? (d(".palette", "nmenu-selected"), i = "background", e.target.className = "background selected", e.target.previousElementSibling.className = "font", t.style && t.style.background && (c.querySelector('.palette[data-color="' + t.style.background + '"]').className = "palette nmenu-selected")) : "font" === e.target.className && (d(".palette", "nmenu-selected"), i = "font", e.target.className = "font selected", e.target.nextElementSibling.className = "background", t.style && t.style.color && (c.querySelector('.palette[data-color="' + t.style.color + '"]').className = "palette nmenu-selected"))
                            }
                        }, Array.from(s).map(function (e) {
                            return e.onclick = function (e) {
                                n.currentNode.nodeObj.style || (n.currentNode.nodeObj.style = {}), d(".size", "size-selected");
                                var t = e.currentTarget;
                                n.currentNode.nodeObj.style.fontSize = t.dataset.size, t.className = "size size-selected", n.updateNodeStyle(n.currentNode.nodeObj)
                            }
                        }), l.onclick = function (e) {
                            n.currentNode.nodeObj.style || (n.currentNode.nodeObj.style = {}), "bold" === n.currentNode.nodeObj.style.fontWeight ? (delete n.currentNode.nodeObj.style.fontWeight, e.currentTarget.className = "bold") : (n.currentNode.nodeObj.style.fontWeight = "bold", e.currentTarget.className = "bold size-selected"), n.updateNodeStyle(n.currentNode.nodeObj)
                        }, u.onchange = function (e) {
                            n.currentNode && (e.target.value ? n.currentNode.nodeObj.tags = e.target.value.split(",") : n.currentNode.nodeObj.tags = [], n.updateNodeTags(n.currentNode.nodeObj))
                        }, f.onchange = function (e) {
                            n.currentNode && (n.currentNode.nodeObj.icons = e.target.value.split(","), n.updateNodeIcons(n.currentNode.nodeObj))
                        };
                        var m = "open";
                        p.onclick = function (e) {
                            "open" === m ? (m = "close", c.className = "close", p.innerHTML = '<svg class="icon" aria-hidden="true">\n    <use xlink:href="#icon-menu"></use>\n    </svg>') : (m = "open", c.className = "", p.innerHTML = '<svg class="icon" aria-hidden="true">\n    <use xlink:href="#icon-close"></use>\n    </svg>')
                        }, n.bus.addListener("unselectNode", function () {
                            c.hidden = !0
                        }), n.bus.addListener("selectNode", function (e) {
                            c.hidden = !1, d(".palette", "nmenu-selected"), d(".size", "size-selected"), d(".bold", "size-selected"), i = "font", h.className = "font selected", h.nextElementSibling.className = "background", e.style && (e.style.fontSize && (c.querySelector('.size[data-size="' + e.style.fontSize + '"]').className = "size size-selected"), e.style.fontWeight && (c.querySelector(".bold").className = "bold size-selected"), e.style.color && (c.querySelector('.palette[data-color="' + e.style.color + '"]').className = "palette nmenu-selected")), e.tags ? u.value = e.tags.join(",") : u.value = "", e.icons ? f.value = e.icons.join(",") : f.value = ""
                        })
                    }(this), this.keypress && function (t) {
                        ce.unbind("del,backspace,f2,tab,enter,left,right,down,up"), ce("del,backspace", {
                            element: t.map
                        }, function (e) {
                            t.currentLink ? t.removeLink() : t.removeNode()
                        }), ce("f2,tab,enter,left,right,down,up,pageup,pagedown,ctrl+z, command+z", {
                            element: t.map
                        }, function (e, t) {
                            e.preventDefault(), n[t.key]()
                        });
                        var n = {
                            enter: function () {
                                t.insertSibling()
                            },
                            tab: function () {
                                t.addChild()
                            },
                            f2: function () {
                                t.beginEdit()
                            },
                            up: function () {
                                t.selectPrevSibling()
                            },
                            down: function () {
                                t.selectNextSibling()
                            },
                            left: function () {
                                t.currentNode && ("rhs" === t.currentNode.offsetParent.offsetParent.className ? t.selectParent() : "lhs" === t.currentNode.offsetParent.offsetParent.className && t.selectFirstChild())
                            },
                            right: function () {
                                t.currentNode && ("rhs" === t.currentNode.offsetParent.offsetParent.className ? t.selectFirstChild() : "lhs" === t.currentNode.offsetParent.offsetParent.className && t.selectParent())
                            },
                            pageup: function () {
                                t.moveUpNode()
                            },
                            pagedown: function () {
                                t.moveDownNode()
                            },
                            "ctrl+z": function () {
                                t.undo()
                            },
                            "command+z": function () {
                                t.undo()
                            }
                        }
                    }(this), window.mevar_draggable && function (t) {
                        var n;
                        t.map.addEventListener("drag", function (e) {}), t.map.addEventListener("dragstart", function (e) {
                            n = e.target, o.clear()
                        }), t.map.addEventListener("dragend", function (e) {
                            e.target.style.opacity = ""
                        }), t.map.addEventListener("dragover", function (e) {
                            e.preventDefault()
                        }), t.map.addEventListener("dragenter", function (e) {
                            "TPC" == e.target.tagName && e.target !== n && (e.target.style.opacity = .5)
                        }), t.map.addEventListener("dragleave", function (e) {
                            "TPC" == e.target.tagName && e.target !== n && (e.target.style.opacity = 1)
                        }), t.map.addEventListener("drop", function (e) {
                            e.preventDefault(), "TPC" == e.target.tagName && e.target !== n && (e.target.style.opacity = 1, t.moveNode(n, e.target), n = null)
                        })
                    }(this), this.toCenter(), this.layout(), this.linkDiv(),
                    function (t) {
                        t.map.addEventListener("click", function (e) {
                            e.preventDefault(), "EPD" === e.target.nodeName ? t.expandNode(e.target.previousSibling) : "T" === e.target.parentElement.nodeName || "ROOT" === e.target.parentElement.nodeName ? t.selectNode(e.target) : "path" === e.target.nodeName ? "g" === e.target.parentElement.nodeName && t.selectLink(e.target.parentElement) : "circle" === e.target.className || (t.unselectNode(), t.hideLinkController())
                        }), t.map.addEventListener("dblclick", function (e) {
                            e.preventDefault(), t.editable && ("T" !== e.target.parentElement.nodeName && "ROOT" !== e.target.parentElement.nodeName || t.createInputDiv(e.target))
                        }), t.map.addEventListener("mousemove", function (e) {
                            "true" !== e.target.contentEditable && o.onMove(e, t.container)
                        }), t.map.addEventListener("mousedown", function (e) {
                            "true" !== e.target.contentEditable && (o.afterMoving = !1, o.mousedown = !0)
                        }), t.map.addEventListener("mouseleave", function (e) {
                            o.clear()
                        }), t.map.addEventListener("mouseup", function (e) {
                            o.clear()
                        })
                    }(this)
            }
        }, pe.LEFT = u, pe.RIGHT = f, pe.SIDE = D, pe.version = i.version, pe.E = O, pe.example = {
            nodeData: {
                id: "root",
                topic: "Mind Elixir",
                root: !0,
                children: [{
                    topic: "What is Minde Elixir",
                    id: "bd4313fbac40284b",
                    direction: 0,
                    expanded: !0,
                    children: [{
                        topic: "A mind map core",
                        id: "beeb823afd6d2114"
                    }, {
                        topic: "Free",
                        id: "c1f068377de9f3a0"
                    }, {
                        topic: "Open-Source",
                        id: "c1f06d38a09f23ca"
                    }, {
                        topic: "Use without JavaScript framework",
                        id: "c1f06e4cbcf16463",
                        expanded: !0,
                        children: []
                    }, {
                        topic: "Use in your own project",
                        id: "c1f1f11a7fbf7550",
                        children: [{
                            topic: "import MindElixir from 'mind-elixir'",
                            id: "c1f1e245b0a89f9b"
                        }, {
                            topic: "new MindElixir({...}).init()",
                            id: "c1f1ebc7072c8928"
                        }]
                    }, {
                        topic: "Easy to use",
                        id: "c1f0723c07b408d7",
                        expanded: !0,
                        children: [{
                            topic: "Use it like other mind map application",
                            id: "c1f09612fd89920d"
                        }]
                    }]
                }, {
                    topic: "Basics",
                    id: "bd1b66c4b56754d9",
                    direction: 0,
                    expanded: !0,
                    children: [{
                        topic: "tab - Create a child node",
                        id: "bd1b6892bcab126a"
                    }, {
                        topic: "enter - Create a sibling node",
                        id: "bd1b6b632a434b27"
                    }, {
                        topic: "del - Remove a node",
                        id: "bd1b983085187c0a"
                    }]
                }, {
                    topic: "Focus mode",
                    id: "bd1b9b94a9a7a913",
                    direction: 1,
                    expanded: !0,
                    children: [{
                        topic: "Right click and select Focus Mode",
                        id: "bd1bb2ac4bbab458"
                    }, {
                        topic: "Right click and select Cancel Focus Mode",
                        id: "bd1bb4b14d6697c3"
                    }]
                }, {
                    topic: "Left menu",
                    id: "bd1b9d1816ede134",
                    direction: 0,
                    expanded: !0,
                    children: [{
                        topic: "Node distribution",
                        id: "bd1ba11e620c3c1a",
                        expanded: !0,
                        children: [{
                            topic: "Left",
                            id: "bd1c1cb51e6745d3"
                        }, {
                            topic: "Right",
                            id: "bd1c1e12fd603ff6"
                        }, {
                            topic: "Both l & r",
                            id: "bd1c1f03def5c97b"
                        }]
                    }]
                }, {
                    topic: "Bottom menu",
                    id: "bd1ba66996df4ba4",
                    direction: 1,
                    expanded: !0,
                    children: [{
                        topic: "Full screen",
                        id: "bd1ba81d9bc95a7e"
                    }, {
                        topic: "Return to Center",
                        id: "bd1babdd5c18a7a2"
                    }, {
                        topic: "Zoom in",
                        id: "bd1bae68e0ab186e"
                    }, {
                        topic: "Zoom out",
                        id: "bd1bb06377439977"
                    }]
                }, {
                    topic: "Link",
                    id: "bd1beff607711025",
                    direction: 0,
                    expanded: !0,
                    children: [{
                        topic: "Right click and select Link",
                        id: "bd1bf320da90046a"
                    }, {
                        topic: "Click the target you want to link",
                        id: "bd1bf6f94ff2e642"
                    }, {
                        topic: "Modify link with control points",
                        id: "bd1c0c4a487bd036"
                    }]
                }, {
                    topic: "Node style",
                    id: "bd1c217f9d0b20bd",
                    direction: 0,
                    expanded: !0,
                    children: [{
                        topic: "Font Size",
                        id: "bd1c24420cd2c2f5",
                        style: {
                            fontSize: "32",
                            color: "#3298db"
                        }
                    }, {
                        topic: "Font Color",
                        id: "bd1c2a59b9a2739c",
                        style: {
                            color: "#c0392c"
                        }
                    }, {
                        topic: "Background Color",
                        id: "bd1c2de33f057eb4",
                        style: {
                            color: "#bdc3c7",
                            background: "#2c3e50"
                        }
                    }, {
                        topic: "Add tags",
                        id: "bd1cff58364436d0",
                        tags: ["Completed"]
                    }, {
                        topic: "Add icons",
                        id: "bd1d0317f7e8a61a",
                        icons: ["😂"],
                        tags: ["www"]
                    }, {
                        topic: "Bolder",
                        id: "bd41fd4ca32322a4",
                        style: {
                            fontWeight: "bold"
                        }
                    }]
                }, {
                    topic: "Draggable",
                    id: "bd1f03fee1f63bc6",
                    direction: 1,
                    expanded: !0,
                    children: [{
                        topic: "Drag a node to another node and the former one become a child node of latter one",
                        id: "bd1f07c598e729dc"
                    }]
                }, {
                    topic: "TODO",
                    id: "bd1facea32a1967c",
                    direction: 1,
                    expanded: !0,
                    children: [{
                        topic: "Add image",
                        id: "bd1fb1ec53010749"
                    }, {
                        topic: "Free node (position)",
                        id: "bd42d3e3bee992b9"
                    }, {
                        topic: "Style adjustment",
                        id: "beeb7f3db6ad6496"
                    }]
                }, {
                    topic: "Export data",
                    id: "beeb7586973430db",
                    direction: 1,
                    expanded: !0,
                    children: [{
                        topic: "JSON",
                        id: "beeb784cc189375f"
                    }, {
                        topic: "HTML",
                        id: "beeb7a6bec2d68f5"
                    }]
                }, {
                    topic: "Caution",
                    id: "bd42dad21aaf6bae",
                    direction: 0,
                    style: {
                        background: "#f1c40e"
                    },
                    expanded: !0,
                    children: [{
                        topic: "Only save manually",
                        id: "bd42e1d0163ebf04",
                        expanded: !0,
                        children: [{
                            topic: "Save button in the top-right corner",
                            id: "bd42e619051878b3",
                            expanded: !0,
                            children: []
                        }, {
                            topic: "ctrl + S",
                            id: "bd42e97d7ac35e99"
                        }]
                    }]
                }],
                expanded: !0
            },
            linkData: {}
        }, pe.example2 = {
            nodeData: {
                id: "root",
                topic: "HTML structure",
                root: !0,
                children: [{
                    topic: "div.map-container",
                    id: "33905a6bde6512e4",
                    expanded: !0,
                    children: [{
                        topic: "div.map-canvas",
                        id: "33905d3c66649e8f",
                        tags: ["A special case of grp tag"],
                        expanded: !0,
                        children: [{
                            topic: "root",
                            id: "33906b754897b9b9",
                            tags: ["A special case of t tag"],
                            expanded: !0,
                            children: [{
                                topic: "tpc",
                                id: "33b5cbc93b9968ab"
                            }]
                        }, {
                            topic: "children.box",
                            id: "33906db16ed7f956",
                            expanded: !0,
                            children: [{
                                topic: "grp(group)",
                                id: "33907d9a3664cc8a",
                                expanded: !0,
                                children: [{
                                    topic: "t(top)",
                                    id: "3390856d09415b95",
                                    expanded: !0,
                                    children: [{
                                        topic: "tpc(topic)",
                                        id: "33908dd36c7d32c5",
                                        expanded: !0,
                                        children: [{
                                            topic: "text",
                                            id: "3391630d4227e248"
                                        }, {
                                            topic: "icons",
                                            id: "33916d74224b141f"
                                        }, {
                                            topic: "tags",
                                            id: "33916421bfff1543"
                                        }],
                                        tags: ["E() function return"]
                                    }, {
                                        topic: "epd(expander)",
                                        id: "33909032ed7b5e8e",
                                        tags: ["If had child"]
                                    }],
                                    tags: ["createTop retun"]
                                }, {
                                    topic: "children",
                                    id: "339087e1a8a5ea68",
                                    expanded: !0,
                                    children: [{
                                        topic: "grp",
                                        id: "3390930112ea7367",
                                        tags: ["what add node actually do is to append grp tag to children"]
                                    }, {
                                        topic: "grp...",
                                        id: "3390940a8c8380a6"
                                    }],
                                    tags: ["createChildren return"]
                                }, {
                                    topic: "svg.svg3rd",
                                    id: "33908986b6336a4f"
                                }],
                                tags: ["have child"]
                            }, {
                                topic: "grp",
                                id: "339081c3c5f57756",
                                expanded: !0,
                                children: [{
                                    topic: "t",
                                    id: "33b6160ec048b997",
                                    expanded: !0,
                                    children: [{
                                        topic: "tpc",
                                        id: "33b616f9fe7763fc"
                                    }]
                                }],
                                tags: ["no child"]
                            }, {
                                topic: "grp...",
                                id: "33b61346707af71a"
                            }]
                        }, {
                            topic: "svg.svg2nd",
                            id: "3390707d68c0779d"
                        }, {
                            topic: "svg.linkcontroller",
                            id: "339072cb6cf95295"
                        }, {
                            topic: "svg.topiclinks",
                            id: "3390751acbdbdb9f"
                        }]
                    }, {
                        topic: "cmenu",
                        id: "33905f95aeab942d"
                    }, {
                        topic: "toolbar.rb",
                        id: "339060ac0343f0d7"
                    }, {
                        topic: "toolbar.lt",
                        id: "3390622b29323de9"
                    }, {
                        topic: "nmenu",
                        id: "3390645e6d7c2b4e"
                    }]
                }]
            },
            linkData: {}
        }, pe.new = function (e) {
            return {
                nodeData: {
                    id: "root",
                    topic: e || "new topic",
                    root: !0,
                    children: []
                },
                linkData: {}
            }
        }, pe.newNode = function (e) {
            var t = e.topic;
            return {
                id: generateUUID(),
                topic: t
            }
        };
        t.default = pe
    }], o.c = i, o.d = function (e, t, n) {
        o.o(e, t) || Object.defineProperty(e, t, {
            enumerable: !0,
            get: n
        })
    }, o.r = function (e) {
        "undefined" != typeof Symbol && Symbol.toStringTag && Object.defineProperty(e, Symbol.toStringTag, {
            value: "Module"
        }), Object.defineProperty(e, "__esModule", {
            value: !0
        })
    }, o.t = function (t, e) {
        if (1 & e && (t = o(t)), 8 & e) return t;
        if (4 & e && "object" == typeof t && t && t.__esModule) return t;
        var n = Object.create(null);
        if (o.r(n), Object.defineProperty(n, "default", {
                enumerable: !0,
                value: t
            }), 2 & e && "string" != typeof t)
            for (var i in t) o.d(n, i, function (e) {
                return t[e]
            }.bind(null, i));
        return n
    }, o.n = function (e) {
        var t = e && e.__esModule ? function () {
            return e.default
        } : function () {
            return e
        };
        return o.d(t, "a", t), t
    }, o.o = function (e, t) {
        return Object.prototype.hasOwnProperty.call(e, t)
    }, o.p = "", o(o.s = 13)).default;

    function o(e) {
        if (i[e]) return i[e].exports;
        var t = i[e] = {
            i: e,
            l: !1,
            exports: {}
        };
        return n[e].call(t.exports, t, t.exports, o), t.l = !0, t.exports
    }
    var n, i
});