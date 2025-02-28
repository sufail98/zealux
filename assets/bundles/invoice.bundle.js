function print_today() {
    var e = new Date(),
        t = new Array("January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"),
        n = (e.getDate() < 10 ? "0" : "") + e.getDate();
    return t[e.getMonth()] + " " + n + ", " + ((t = e.getYear()) < 1e3 ? t + 1900 : t);
}
function roundNumber(e, t) {
    if ((t = Number(t)) < 1) n = Math.round(e).toString();
    else {
        var n,
            r = e.toString(),
            i = (-1 == r.lastIndexOf(".") && (r += "."), r.lastIndexOf(".") + t),
            o = Number(r.substring(i, i + 1));
        if (5 <= Number(r.substring(i + 1, i + 2))) {
            if (9 == o && 0 < i) for (; 0 < i && (9 == o || isNaN(o)); ) "." != o ? (--i, (o = Number(r.substring(i, i + 1)))) : --i;
            o += 1;
        }
        n = 10 == o ? ((r = r.substring(0, r.lastIndexOf("."))), (Number(r) + 1).toString() + ".") : r.substring(0, i) + o.toString();
    }
    -1 == n.lastIndexOf(".") && (n += ".");
    for (var a = n.substring(n.lastIndexOf(".") + 1).length, c = 0; c < t - a; c++) n += "0";
    return n;
}
function update_total() {
    var t = 0;
    $(".price").each(function (e) {
        (price = $(this).html().replace("$", "")), isNaN(price) || (t += Number(price));
    }),
        (t = roundNumber(t, 2)),
        $("#subtotal").html("$" + t),
        $("#total").html("$" + t),
        update_balance();
}
function update_balance() {
    var e = roundNumber($("#total").html().replace("$", "") - $("#paid").val().replace("$", ""), 2);
    $(".due").html("$" + e);
}
function update_price() {
    var e = $(this).parents(".item-row"),
        t = roundNumber(e.find(".cost").val().replace("$", "") * e.find(".qty").val(), 2);
    isNaN(t) ? e.find(".price").html("N/A") : e.find(".price").html("$" + t), update_total();
}
function bind() {
    $(".cost").blur(update_price), $(".qty").blur(update_price);
}
function removeInvoiceRow(e) {
    $(e).parents(".item-row").remove();
}
!(function (n) {
    function r(e) {
        var t;
        return (i[e] || ((t = i[e] = { i: e, l: !1, exports: {} }), n[e].call(t.exports, t, t.exports, r), (t.l = !0), t)).exports;
    }
    var i = {};
    (r.m = n),
        (r.c = i),
        (r.d = function (e, t, n) {
            r.o(e, t) || Object.defineProperty(e, t, { configurable: !1, enumerable: !0, get: n });
        }),
        (r.n = function (e) {
            var t =
                e && e.__esModule
                    ? function () {
                          return e.default;
                      }
                    : function () {
                          return e;
                      };
            return r.d(t, "a", t), t;
        }),
        (r.o = function (e, t) {
            return Object.prototype.hasOwnProperty.call(e, t);
        }),
        (r.p = ""),
        r((r.s = 0));
})([
    function (e, t, n) {
        function s(e) {
            var t = "",
                t = window.location.origin || window.location.protocol + "://" + window.location.host;
            if (e && "string" == typeof e)
                if (0 === e.indexOf("/")) t += e;
                else
                    try {
                        var n = new URL(e);
                        return n.protocol + "://" + n.host + n.pathname;
                    } catch (e) {}
            else {
                n = window.location.pathname;
                n && 0 < n.length && (t += n);
            }
            return t;
        }
        function u(t) {
            var e;
            return "function" == typeof performance.getEntriesByType &&
                (e = performance.getEntriesByType("paint").filter(function (e) {
                    return e.name === t;
                })[0])
                ? e.startTime
                : 0;
        }
        function d(e) {
            return null == e ? void 0 : Math.round(1e3 * e) / 1e3;
        }
        function l(e, t) {
            for (var n in e) {
                var r = e[n];
                void 0 === t || ("number" != typeof r && "string" != typeof r) || (t[n] = r);
            }
        }
        var r =
                (this && this.__assign) ||
                function () {
                    return (r =
                        Object.assign ||
                        function (e) {
                            for (var t, n = 1, r = arguments.length; n < r; n++) for (var i in (t = arguments[n])) Object.prototype.hasOwnProperty.call(t, i) && (e[i] = t[i]);
                            return e;
                        }).apply(this, arguments);
                },
            f = ((t.__esModule = !0), n(1)),
            i = n(2),
            t = n(3),
            o = n(4);
        function a(e) {
            var n,
                r,
                t = v.timing,
                i = v.memory,
                e = e || s(),
                o = document.referrer || "",
                a = y[2] || y[1] || y[0],
                c = {
                    memory: {},
                    timings: {},
                    resources: [],
                    tempResources: [],
                    referrer: P && T && a ? a.url : o,
                    documentWriteIntervention: !1,
                    errorCount: 0,
                    eventType: f.EventType.Load,
                    firstPaint: 0,
                    firstContentfulPaint: 0,
                    si: h ? h.si : 0,
                    startTime: v.timeOrigin || (t ? t.navigationStart : 0),
                    versions: { fl: h ? h.version : "", js: "2021.8.2", timings: 1 },
                    pageloadId: g,
                    location: e,
                };
            return (
                null == w &&
                    ("function" == typeof v.getEntriesByType && (a = v.getEntriesByType("navigation")) && Array.isArray(a) && 0 < a.length && ((c.timingsV2 = {}), (c.versions.timings = 2), delete c.timings, l(a[0], c.timingsV2)),
                    1 === c.versions.timings && l(t, c.timings),
                    l(i, c.memory)),
                (c.documentWriteIntervention = !!(o = navigator.userAgent.match(/Chrom(e|ium)\/([0-9]+)\./)) && ((o = parseInt(o[2], 10)), (e = navigator.connection), 55 <= o) && !!e && "cellular" === e.type && e.downlinkMax <= 0.115),
                (c.firstPaint = u("first-paint")),
                (c.firstContentfulPaint = u("first-contentful-paint")),
                (c.errorCount = window.__cfErrCount || 0),
                h && ((c.siteToken = h.token), (T = !0)),
                "function" == typeof v.getEntriesByType &&
                    ((a = v.getEntriesByType("resource")),
                    (r = n = 0),
                    a.forEach(function (e) {
                        var e = {
                                n: e.name,
                                s: d(e.startTime),
                                d: d(e.duration),
                                i: e.initiatorType,
                                p: e.nextHopProtocol,
                                rs: d(e.redirectStart),
                                re: d(e.redirectEnd),
                                fs: d(e.fetchStart),
                                ds: d(e.domainLookupStart),
                                de: d(e.domainLookupEnd),
                                cs: d(e.connectStart),
                                ce: d(e.connectEnd),
                                qs: d(e.requestStart),
                                ps: d(e.responseStart),
                                pe: d(e.responseEnd),
                                ws: d(e.workerStart),
                                ss: d(e.secureConnectionStart),
                                ts: e.transferSize,
                                ec: e.encodedBodySize,
                                dc: e.decodedBodySize,
                            },
                            t = (c.tempResources && void 0 === c.tempResources[r] && (c.tempResources[r] = []), JSON.stringify(e).length);
                        n + t < 62e3 && c.tempResources ? ((n += t), c.tempResources[r].push(e)) : (r++, (n = 0));
                    })),
                64e3 <= JSON.stringify(c).length && (c.resources = []),
                void 0 !== w && (delete c.timings, delete c.memory, delete c.errorCount, delete c.documentWriteIntervention),
                c
            );
        }
        var c,
            p,
            m,
            v = window.performance || window.webkitPerformance || window.msPerformance || window.mozPerformance,
            n = document.currentScript || ("function" == typeof document.querySelector ? document.querySelector("script[data-cf-beacon]") : void 0),
            g = o(),
            y = [],
            h = window.__cfBeacon || {};
        if (!h || "single" !== h.load) {
            var w,
                b,
                S = !1,
                T = !1,
                E =
                    (document.addEventListener("visibilitychange", function () {
                        P &&
                            0 ===
                                y.filter(function (e) {
                                    return e.id === g;
                                }).length &&
                            O(),
                            "hidden" === document.visibilityState && !S && T && ((S = !0), C(P));
                    }),
                    { lcp: void 0, cls: void 0, fid: void 0 }),
                $ = function (e) {
                    return e && 0 !== e.length ? e[e.length - 1] : null;
                },
                R = function (e) {
                    var t;
                    return e ? ((t = e.localName), e.id && 0 < e.id.length && (t += "#" + e.id), e.className && 0 < e.className.length && (t += "." + e.className.split(" ").join(".")), t) : "";
                },
                L = function (e) {
                    var t,
                        n = window.location.pathname;
                    "CLS" === e.name
                        ? ((E.cls = { value: e.value, path: n }),
                          (t = (function (e) {
                              if (!e || 0 === e.length) return null;
                              e = e.reduce(function (e, t) {
                                  return e && e.value > t.value ? e : t;
                              });
                              if (e && e.sources && e.sources.length) {
                                  e = e.sources.reduce(function (e, t) {
                                      return e.node && e.previousRect.width * e.previousRect.height > t.previousRect.width * t.previousRect.height ? e : t;
                                  });
                                  if (e) return e;
                              }
                          })(e.entries)) && ((E.cls.element = R(t.node)), (E.cls.currentRect = t.currentRect), (E.cls.previousRect = t.previousRect)))
                        : "FID" === e.name
                        ? ((E.fid = { value: e.value, path: n }), (t = $(e.entries)) && ((E.fid.element = R(t.target)), (E.fid.name = t.name)))
                        : "LCP" === e.name && ((E.lcp = { value: e.value, path: n }), (t = $(e.entries))) && ((E.lcp.element = R(t.element)), (E.lcp.size = t.size), (E.lcp.url = t.url));
                };
            if (("function" == typeof PerformanceObserver && (t.getLCP(L, !0), t.getFID(L), PerformanceObserver.supportedEntryTypes) && PerformanceObserver.supportedEntryTypes.includes("layout-shift") && t.getCLS(L, !0), n)) {
                L = n.getAttribute("data-cf-beacon");
                if (L)
                    try {
                        h = r(r({}, h), JSON.parse(L));
                    } catch (e) {}
                else {
                    var L = n.getAttribute("src");
                    L && "function" == typeof URLSearchParams && ((L = (n = new URLSearchParams(L.replace(/^[^\?]+\??/, ""))).get("token")) && (h.token = L), (L = n.get("spa")), (h.spa = null === L || "true" === L));
                }
                h && "multi" !== h.load && (h.load = "single"), (window.__cfBeacon = h);
            }
            var _,
                O,
                C,
                N,
                P = h && (void 0 === h.spa || !0 === h.spa);
            v &&
                h &&
                h.token &&
                ((_ = h.send && h.send.to ? h.send.to : void 0 === h.version ? "https://cloudflareinsights.com/cdn-cgi/rum" : null),
                (O = function (e) {
                    function n(e, t) {
                        (r.resources = e),
                            0 != t && (r.bypassTiming = !0),
                            h &&
                                (1 === h.r && (r.resources = []), P && 0 === t && (y.push({ id: r.pageloadId, url: r.location }), 3 < y.length) && y.shift(), i.sendObjectBeacon("", r, function () {}, !1, _), void 0 !== h.forward) &&
                                void 0 !== h.forward.url &&
                                i.sendObjectBeacon("", r, function () {}, !1, h.forward.url);
                    }
                    var r = a(e);
                    r &&
                        h &&
                        ((e = r.tempResources), delete r.tempResources, P && e && 0 === e.length && n([], 0), e) &&
                        e.forEach(function (e, t) {
                            n(e, t);
                        });
                }),
                (C = function (e) {
                    var t = (function () {
                        var e = v.timing,
                            t = "";
                        try {
                            t = ("function" == typeof v.getEntriesByType ? new URL(v.getEntriesByType("navigation")[0].name) : b ? new URL(b) : window.location).pathname;
                        } catch (e) {}
                        return (
                            (t = {
                                referrer: document.referrer || "",
                                eventType: f.EventType.WebVitalsV2,
                                lcp: { value: -1, path: void 0 },
                                cls: { value: -1, path: void 0 },
                                fid: { value: -1, path: void 0 },
                                si: h ? h.si : 0,
                                versions: { js: "2021.8.2" },
                                pageloadId: g,
                                location: s(),
                                landingPath: t,
                                startTime: v.timeOrigin || (e ? e.navigationStart : 0),
                            }),
                            h && h.version && (t.versions.fl = h.version),
                            E && ((t.lcp = (E.lcp && void 0 !== E.lcp.value ? E : t).lcp), (t.fid = (E.fid && void 0 !== E.fid.value ? E : t).fid), (t.cls = (E.cls && void 0 !== E.cls.value ? E : t).cls)),
                            h && (t.siteToken = h.token),
                            t
                        );
                    })();
                    e || ((t.resources = []), delete t.tempResources), h && i.sendObjectBeacon("", t, function () {}, !0, _);
                }),
                (N = function () {
                    T = !0;
                    var e = (window.__cfRl && window.__cfRl.done) || (window.__cfQR && window.__cfQR.done);
                    e ? e.then(O) : O();
                }),
                "complete" === window.document.readyState
                    ? N()
                    : window.addEventListener("load", function () {
                          window.setTimeout(N);
                      }),
                P) &&
                ((b = s()), (c = window.history), (m = c.pushState)) &&
                ((p = function () {
                    (g = o()), "function" == typeof v.clearResourceTimings && v.clearResourceTimings();
                }),
                (c.pushState = function (e, t, n) {
                    return (
                        (w = s(n)),
                        0 ===
                            y.filter(function (e) {
                                return e.id === g;
                            }).length && O(s()),
                        p(),
                        m.apply(c, [e, t, n])
                    );
                }),
                window.addEventListener("popstate", function (e) {
                    0 ===
                        y.filter(function (e) {
                            return e.id === g;
                        }).length && O(w),
                        (w = s()),
                        p();
                }));
        }
    },
    function (e, t, n) {
        (t.__esModule = !0), ((t = t.EventType || (t.EventType = {}))[(t.Load = 1)] = "Load"), (t[(t.Additional = 2)] = "Additional"), (t[(t.WebVitalsV2 = 3)] = "WebVitalsV2");
    },
    function (e, t, n) {
        (t.__esModule = !0),
            (t.sendObjectBeacon = function (e, t, n, r, i) {
                void 0 === r && (r = !1);
                var o,
                    i = (i = void 0 === i ? null : i) || (t.siteToken && t.versions.fl ? "/cdn-cgi/rum?" + e : "/cdn-cgi/beacon/performance?" + e),
                    a = !0;
                if (navigator && "string" == typeof navigator.userAgent)
                    try {
                        var c = navigator.userAgent.match(/Chrome\/([0-9]+)/);
                        c && -1 < c[0].toLowerCase().indexOf("chrome") && parseInt(c[1]) < 81 && (a = !1);
                    } catch (e) {}
                navigator && "function" == typeof navigator.sendBeacon && a && r
                    ? ((t.st = 1), (o = JSON.stringify(t)), navigator.sendBeacon(i, new Blob([o], { type: "application/json" })))
                    : ((t.st = 2),
                      (o = JSON.stringify(t)),
                      (c = new XMLHttpRequest()),
                      n &&
                          (c.onreadystatechange = function () {
                              4 == this.readyState && 204 == this.status && n();
                          }),
                      c.open("POST", i, !0),
                      c.setRequestHeader("content-type", "application/json"),
                      c.send(o));
            });
    },
    function (e, t, n) {
        t.__esModule = !0;
        function u(e, t) {
            return { name: e, value: void 0 === t ? -1 : t, delta: 0, entries: [], id: "v2-".concat(Date.now(), "-").concat(Math.floor(8999999999999 * Math.random()) + 1e12) };
        }
        function d(e, t) {
            try {
                var n;
                if (PerformanceObserver.supportedEntryTypes.includes(e))
                    if ("first-input" !== e || "PerformanceEventTiming" in self)
                        return (
                            (n = new PerformanceObserver(function (e) {
                                return e.getEntries().map(t);
                            })).observe({ type: e, buffered: !0 }),
                            n
                        );
            } catch (e) {}
        }
        function l(t, n, r) {
            var i;
            return function (e) {
                0 <= n.value && (e || r) && ((n.delta = n.value - (i || 0)), n.delta || void 0 === i) && ((i = n.value), t(n));
            };
        }
        function s() {
            return (
                i < 0 &&
                    ((i = o()),
                    a(),
                    g(function () {
                        setTimeout(function () {
                            (i = o()), a();
                        }, 0);
                    })),
                {
                    get firstHiddenTime() {
                        return i;
                    },
                }
            );
        }
        function f(t, n) {
            function e(e) {
                "first-contentful-paint" === e.name && (c && c.disconnect(), e.startTime < i.firstHiddenTime) && ((o.value = e.startTime), o.entries.push(e), r(!0));
            }
            var r,
                i = s(),
                o = u("FCP"),
                a = performance.getEntriesByName && performance.getEntriesByName("first-contentful-paint")[0],
                c = a ? null : d("paint", e);
            (a || c) &&
                ((r = l(t, o, n)),
                a && e(a),
                g(function (e) {
                    (o = u("FCP")),
                        (r = l(t, o, n)),
                        requestAnimationFrame(function () {
                            requestAnimationFrame(function () {
                                (o.value = performance.now() - e.timeStamp), r(!0);
                            });
                        });
                }));
        }
        var c,
            p,
            r,
            m,
            v = function (t, n) {
                function r(e) {
                    ("pagehide" !== e.type && "hidden" !== document.visibilityState) || (t(e), n && (removeEventListener("visibilitychange", r, !0), removeEventListener("pagehide", r, !0)));
                }
                addEventListener("visibilitychange", r, !0), addEventListener("pagehide", r, !0);
            },
            g = function (t) {
                addEventListener(
                    "pageshow",
                    function (e) {
                        e.persisted && t(e);
                    },
                    !0
                );
            },
            i = -1,
            o = function () {
                return "hidden" === document.visibilityState ? 0 : 1 / 0;
            },
            a = function () {
                v(function (e) {
                    e = e.timeStamp;
                    i = e;
                }, !0);
            },
            y = !1,
            h = -1,
            w = { passive: !0, capture: !0 },
            b = new Date(),
            S = function (e, t) {
                c || ((c = t), (p = e), (r = new Date()), $(removeEventListener), T());
            },
            T = function () {
                var t;
                0 <= p &&
                    p < r - b &&
                    ((t = { entryType: "first-input", name: c.type, target: c.target, cancelable: c.cancelable, startTime: c.timeStamp, processingStart: c.timeStamp + p }),
                    m.forEach(function (e) {
                        e(t);
                    }),
                    (m = []));
            },
            E = function (e) {
                var t, n, r, i, o, a;
                e.cancelable &&
                    ((t = (1e12 < e.timeStamp ? new Date() : performance.now()) - e.timeStamp),
                    "pointerdown" == e.type
                        ? ((n = t),
                          (r = e),
                          (i = function () {
                              S(n, r), a();
                          }),
                          (o = function () {
                              a();
                          }),
                          (a = function () {
                              removeEventListener("pointerup", i, w), removeEventListener("pointercancel", o, w);
                          }),
                          addEventListener("pointerup", i, w),
                          addEventListener("pointercancel", o, w))
                        : S(t, e));
            },
            $ = function (t) {
                ["mousedown", "keydown", "touchstart", "pointerdown"].forEach(function (e) {
                    return t(e, E, w);
                });
            },
            R = new Set();
        (t.getFCP = f),
            (t.getCLS = function (t, e) {
                y ||
                    (f(function (e) {
                        h = e.value;
                    }),
                    (y = !0));
                function n(e) {
                    -1 < h && t(e);
                }
                function r(e) {
                    var t, n;
                    e.hadRecentInput ||
                        ((t = c[0]),
                        (n = c[c.length - 1]),
                        a && e.startTime - n.startTime < 1e3 && e.startTime - t.startTime < 5e3 ? ((a += e.value), c.push(e)) : ((a = e.value), (c = [e])),
                        a > o.value && ((o.value = a), (o.entries = c), i()));
                }
                var i,
                    o = u("CLS", 0),
                    a = 0,
                    c = [],
                    s = d("layout-shift", r);
                s &&
                    ((i = l(n, o, e)),
                    v(function () {
                        s.takeRecords().map(r), i(!0);
                    }),
                    g(function () {
                        (h = -1), (o = u("CLS", (a = 0))), (i = l(n, o, e));
                    }));
            }),
            (t.getFID = function (e, t) {
                function n(e) {
                    e.startTime < r.firstHiddenTime && ((i.value = e.processingStart - e.startTime), i.entries.push(e), a(!0));
                }
                var r = s(),
                    i = u("FID"),
                    o = d("first-input", n),
                    a = l(e, i, t);
                o &&
                    v(function () {
                        o.takeRecords().map(n), o.disconnect();
                    }, !0),
                    o &&
                        g(function () {
                            (i = u("FID")), (a = l(e, i, t)), (m = []), (p = -1), (c = null), $(addEventListener), m.push(n), T();
                        });
            }),
            (t.getLCP = function (t, n) {
                function e(e) {
                    var t = e.startTime;
                    t < o.firstHiddenTime && ((a.value = t), a.entries.push(e)), r();
                }
                var r,
                    i,
                    o = s(),
                    a = u("LCP"),
                    c = d("largest-contentful-paint", e);
                c &&
                    ((r = l(t, a, n)),
                    (i = function () {
                        R.has(a.id) || (c.takeRecords().map(e), c.disconnect(), R.add(a.id), r(!0));
                    }),
                    ["keydown", "click"].forEach(function (e) {
                        addEventListener(e, i, { once: !0, capture: !0 });
                    }),
                    v(i, !0),
                    g(function (e) {
                        (a = u("LCP")),
                            (r = l(t, a, n)),
                            requestAnimationFrame(function () {
                                requestAnimationFrame(function () {
                                    (a.value = performance.now() - e.timeStamp), R.add(a.id), r(!0);
                                });
                            });
                    }));
            }),
            (t.getTTFB = function (t) {
                var n = u("TTFB"),
                    e = function () {
                        try {
                            var e =
                                performance.getEntriesByType("navigation")[0] ||
                                (function () {
                                    var e,
                                        t = performance.timing,
                                        n = { entryType: "navigation", startTime: 0 };
                                    for (e in t) "navigationStart" !== e && "toJSON" !== e && (n[e] = Math.max(t[e] - t.navigationStart, 0));
                                    return n;
                                })();
                            (n.value = n.delta = e.responseStart), n.value < 0 || ((n.entries = [e]), t(n));
                        } catch (e) {}
                    };
                "complete" === document.readyState ? setTimeout(e, 0) : addEventListener("pageshow", e);
            });
    },
    function (e, t, n) {
        var a = n(5),
            c = n(6);
        e.exports = function (e, t, n) {
            var r = (t && n) || 0,
                i = ("string" == typeof e && ((t = "binary" === e ? new Array(16) : null), (e = null)), (e = e || {}).random || (e.rng || a)());
            if (((i[6] = (15 & i[6]) | 64), (i[8] = (63 & i[8]) | 128), t)) for (var o = 0; o < 16; ++o) t[r + o] = i[o];
            return t || c(i);
        };
    },
    function (e, t, n) {
        var r,
            i,
            o =
                ("undefined" != typeof crypto && crypto.getRandomValues && crypto.getRandomValues.bind(crypto)) ||
                ("undefined" != typeof msCrypto && "function" == typeof window.msCrypto.getRandomValues && msCrypto.getRandomValues.bind(msCrypto));
        o
            ? ((r = new Uint8Array(16)),
              (e.exports = function () {
                  return o(r), r;
              }))
            : ((i = new Array(16)),
              (e.exports = function () {
                  for (var e, t = 0; t < 16; t++) 0 == (3 & t) && (e = 4294967296 * Math.random()), (i[t] = (e >>> ((3 & t) << 3)) & 255);
                  return i;
              }));
    },
    function (e, t, n) {
        for (var r = [], i = 0; i < 256; ++i) r[i] = (i + 256).toString(16).substr(1);
        e.exports = function (e, t) {
            var t = t || 0,
                n = r;
            return [n[e[t++]], n[e[t++]], n[e[t++]], n[e[t++]], "-", n[e[t++]], n[e[t++]], "-", n[e[t++]], n[e[t++]], "-", n[e[t++]], n[e[t++]], "-", n[e[t++]], n[e[t++]], n[e[t++]], n[e[t++]], n[e[t++]], n[e[+t]]].join("");
        };
    },
]),
    $(document).ready(function () {
        $("input").on("click", function () {
            $(this).select();
        }),
            $("#paid").blur(update_balance),
            $("#addrow").on("click", function () {
                $(".item-row:last").after(
                    '<tr class="item-row"><td class="item-name"><div class="delete-wpr"><textarea>Item Name</textarea><a class="delete" href="javascript:;" title="Remove row" onClick="removeInvoiceRow(this)">X</a></div></td><td class="description"><textarea>Description</textarea></td><td><textarea class="cost">$0</textarea></td><td><textarea class="qty">0</textarea></td><td><span class="price">$0</span></td></tr>'
                ),
                    0 < $(".delete").length && $(".delete").show(),
                    bind();
            }),
            bind(),
            $(".delete").on("click", function () {
                removeInvoiceRow(this), update_total(), $(".delete").length < 2 && $(".delete").hide();
            }),
            $("#cancel-logo").on("click", function () {
                $("#logo").removeClass("edit");
            }),
            $("#delete-logo").on("click", function () {
                $("#logo").remove();
            }),
            $("#change-logo").on("click", function () {
                $("#logo").addClass("edit"), $("#imageloc").val($("#image").attr("src")), $("#image").select();
            }),
            $("#save-logo").on("click", function () {
                $("#image").attr("src", $("#imageloc").val()), $("#logo").removeClass("edit");
            }),
            $("#date").val(print_today());
    });
