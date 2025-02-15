/*!
 * froala_editor v2.7.1 (https://www.froala.com/wysiwyg-editor)
 * License https://froala.com/wysiwyg-editor/terms/
 * Copyright 2014-2017 Froala Labs
 */
! function(a) {
    "function" == typeof define && define.amd ? define(["jquery"], a) : "object" == typeof module && module.exports ? module.exports = function(b, c) {
        return void 0 === c && (c = "undefined" != typeof window ? require("jquery") : require("jquery")(b)), a(c)
    } : a(window.jQuery)
}(function(a) {
    a.extend(a.FE.POPUP_TEMPLATES, {
        "image.insert": "[_BUTTONS_][_UPLOAD_LAYER_][_BY_URL_LAYER_][_PROGRESS_BAR_]",
        "image.edit": "[_BUTTONS_]",
        "image.alt": "[_BUTTONS_][_ALT_LAYER_]",
        "image.size": "[_BUTTONS_][_SIZE_LAYER_]"
    }), a.extend(a.FE.DEFAULTS, {
        imageInsertButtons: ["imageBack", "|", "imageUpload", "imageByURL"],
        imageEditButtons: ["imageReplace", "imageAlign", "imageCaption", "imageRemove", "|", "imageLink", "linkOpen", "linkEdit", "linkRemove", "-", "imageDisplay", "imageStyle", "imageAlt", "imageSize"],
        imageAltButtons: ["imageBack", "|"],
        imageSizeButtons: ["imageBack", "|"],
        imageUpload: !0,
        // imageUploadURL: "https://assets.dev-baboo.co.id/baboo-cover",
        // imageCORSProxy: "https://cors-anywhere.froala.com",
        imageUploadRemoteUrls: !0,
        imageUploadParam: "file",
        imageUploadParams: {},
        imageUploadToS3: !1,
        imageUploadMethod: "POST",
        imageMaxSize: 10485760,
        imageAllowedTypes: ["jpeg", "jpg", "png", "gif", "svg+xml"],
        imageResize: !0,
        imageResizeWithPercent: !1,
        imageRoundPercent: !1,
        imageDefaultWidth: 300,
        imageDefaultAlign: "center",
        imageDefaultDisplay: "block",
        imageSplitHTML: !1,
        imageStyles: {
            "fr-rounded": "Rounded",
            "fr-bordered": "Bordered",
            "fr-shadow": "Shadow"
        },
        imageMove: !0,
        imageMultipleStyles: !0,
        imageTextNear: !0,
        imagePaste: !0,
        imagePasteProcess: !1,
        imageMinWidth: 16,
        imageOutputSize: !1,
        imageDefaultMargin: 5
    }), a.FE.PLUGINS.image = function(b) {
        function c() {
            var a = b.popups.get("image.insert"),
                c = a.find(".fr-image-by-url-layer input");
            c.val(""), Da && c.val(Da.attr("src")), c.trigger("change")
        }

        function d() {
            var a = b.$tb.find('.fr-command[data-cmd="insertImage"]'),
                c = b.popups.get("image.insert");
            if (c || (c = M()), s(), !c.hasClass("fr-active"))
                if (b.popups.refresh("image.insert"), b.popups.setContainer("image.insert", b.$tb), a.is(":visible")) {
                    var d = a.offset().left + a.outerWidth() / 2,
                        e = a.offset().top + (b.opts.toolbarBottom ? 10 : a.outerHeight() - 10);
                    b.popups.show("image.insert", d, e, a.outerHeight())
                } else b.position.forSelection(c), b.popups.show("image.insert")
        }

        function e() {
            var a = b.popups.get("image.edit");
            if (a || (a = q()), a) {
                var c = za();
                Ba() && (c = c.find(".fr-img-wrap")), b.popups.setContainer("image.edit", b.$sc), b.popups.refresh("image.edit");
                var d = c.offset().left + c.outerWidth() / 2,
                    e = c.offset().top + c.outerHeight();
                b.popups.show("image.edit", d, e, c.outerHeight())
            }
        }

        function f() {
            s()
        }

        function g(a) {
            a.hasClass("fr-dii") || a.hasClass("fr-dib") || (a.addClass("fr-fi" + pa(a)[0]), a.addClass("fr-di" + qa(a)[0]), a.css("margin", ""), a.css("float", ""), a.css("display", ""), a.css("z-index", ""), a.css("position", ""), a.css("overflow", ""), a.css("vertical-align", ""))
        }

        function h(a) {
            var b = a.hasClass("fr-dib") ? "block" : a.hasClass("fr-dii") ? "inline" : null,
                c = a.hasClass("fr-fil") ? "left" : a.hasClass("fr-fir") ? "right" : pa(a);
            na(a, b, c), a.removeClass("fr-dib fr-dii fr-fir fr-fil")
        }

        function i() {
            for (var c = "IMG" == b.el.tagName ? [b.el] : b.el.querySelectorAll("img"), d = 0; d < c.length; d++) {
                var e = a(c[d]);
                !b.opts.htmlUntouched && b.opts.useClasses ? ((b.opts.imageEditButtons.indexOf("imageAlign") >= 0 || b.opts.imageEditButtons.indexOf("imageDisplay") >= 0) && g(e), b.opts.imageTextNear || e.removeClass("fr-dii").addClass("fr-dib")) : b.opts.htmlUntouched || b.opts.useClasses || (b.opts.imageEditButtons.indexOf("imageAlign") >= 0 || b.opts.imageEditButtons.indexOf("imageDisplay") >= 0) && h(e), b.opts.iframe && e.on("load", b.size.syncIframe)
            }
        }

        function j(c) {
            "undefined" == typeof c && (c = !0);
            var d, e = Array.prototype.slice.call(b.el.querySelectorAll("img")),
                f = [];
            for (d = 0; d < e.length; d++) f.push(e[d].getAttribute("src")), a(e[d]).toggleClass("fr-draggable", b.opts.imageMove), "" === e[d].getAttribute("class") && e[d].removeAttribute("class"), "" === e[d].getAttribute("style") && e[d].removeAttribute("style");
            if (Ra)
                for (d = 0; d < Ra.length; d++) f.indexOf(Ra[d].getAttribute("src")) < 0 && b.events.trigger("image.removed", [a(Ra[d])]);
            if (Ra && c) {
                var g = [];
                for (d = 0; d < Ra.length; d++) g.push(Ra[d].getAttribute("src"));
                for (d = 0; d < e.length; d++) g.indexOf(e[d].getAttribute("src")) < 0 && b.events.trigger("image.loaded", [a(e[d])])
            }
            Ra = e
        }

        function k() {
            if (Ea || Z(), !Da) return !1;
            var a = b.$wp || b.$sc;
            a.append(Ea), Ea.data("instance", b);
            var c = a.scrollTop() - ("static" != a.css("position") ? a.offset().top : 0),
                d = a.scrollLeft() - ("static" != a.css("position") ? a.offset().left : 0);
            d -= b.helpers.getPX(a.css("border-left-width")), c -= b.helpers.getPX(a.css("border-top-width")), b.$el.is("img") && b.$sc.is("body") && (c = 0, d = 0);
            var e = za();
            Ba() && (e = e.find(".fr-img-wrap")), Ea.css("top", (b.opts.iframe ? e.offset().top : e.offset().top + c) - 1).css("left", (b.opts.iframe ? e.offset().left : e.offset().left + d) - 1).css("width", e.get(0).getBoundingClientRect().width).css("height", e.get(0).getBoundingClientRect().height).addClass("fr-active")
        }

        function l(a) {
            return '<div class="fr-handler fr-h' + a + '"></div>'
        }

        function m(c) {
            if (!b.core.sameInstance(Ea)) return !0;
            if (c.preventDefault(), c.stopPropagation(), b.$el.find("img.fr-error").left) return !1;
            b.undo.canDo() || b.undo.saveStep();
            var d = c.pageX || c.originalEvent.touches[0].pageX;
            if ("mousedown" == c.type) {
                var e = b.$oel.get(0),
                    f = e.ownerDocument,
                    g = f.defaultView || f.parentWindow,
                    h = !1;
                try {
                    h = g.location != g.parent.location && !(g.$ && g.$.FE)
                } catch (i) {}
                h && g.frameElement && (d += b.helpers.getPX(a(g.frameElement).offset().left) + g.frameElement.clientLeft)
            }
            Fa = a(this), Fa.data("start-x", d), Fa.data("start-width", Da.width()), Fa.data("start-height", Da.height());
            var j = Da.width();
            if (b.opts.imageResizeWithPercent) {
                var k = Da.parentsUntil(b.$el, b.html.blockTagsQuery()).get(0) || b.el;
                Da.css("width", (j / a(k).outerWidth() * 100).toFixed(2) + "%")
            } else Da.css("width", j);
            Ga.show(), b.popups.hideAll(), la()
        }

        function n(c) {
            if (!b.core.sameInstance(Ea)) return !0;
            var d;
            if (Fa && Da) {
                if (c.preventDefault(), b.$el.find("img.fr-error").left) return !1;
                var e = c.pageX || (c.originalEvent.touches ? c.originalEvent.touches[0].pageX : null);
                if (!e) return !1;
                var f = Fa.data("start-x"),
                    g = e - f,
                    h = Fa.data("start-width");
                if ((Fa.hasClass("fr-hnw") || Fa.hasClass("fr-hsw")) && (g = 0 - g), b.opts.imageResizeWithPercent) {
                    var i = Da.parentsUntil(b.$el, b.html.blockTagsQuery()).get(0) || b.el;
                    h = ((h + g) / a(i).outerWidth() * 100).toFixed(2), b.opts.imageRoundPercent && (h = Math.round(h)), Da.css("width", h + "%"), d = (b.helpers.getPX(Da.css("width")) / a(i).outerWidth() * 100).toFixed(2), d !== h && Da.css("width", d + "%"), Da.css("height", "").removeAttr("height")
                } else h + g >= b.opts.imageMinWidth && (Ba() && Da.parent().css("width", h + g), Da.css("width", h + g)), d = b.helpers.getPX(Da.css("width")), d !== h + g && Da.css("width", d), (Da.attr("style") || "").match(/(^height:)|(; *height:)/) && Da.css("height", Fa.data("start-height") * Da.width() / Fa.data("start-width"));
                k(), b.events.trigger("image.resize", [ya()])
            }
        }

        function o(a) {
            if (!b.core.sameInstance(Ea)) return !0;
            if (Fa && Da) {
                if (a && a.stopPropagation(), b.$el.find("img.fr-error").left) return !1;
                Fa = null, Ga.hide(), k(), e(), b.undo.saveStep(), b.events.trigger("image.resizeEnd", [ya()])
            }
        }

        function p(a, c, d) {
            b.edit.on(), Da && Da.addClass("fr-error"), u(b.language.translate("Something went wrong. Please try again.")), !Da && d && $(d), b.events.trigger("image.error", [{
                code: a,
                message: Qa[a]
            }, c, d])
        }

        function q(a) {
            if (a) return b.$wp && b.events.$on(b.$wp, "scroll", function() {
                Da && b.popups.isVisible("image.edit") && (b.events.disableBlur(), w(Da))
            }), !0;
            var c = "";
            if (b.opts.imageEditButtons.length > 0) {
                c += '<div class="fr-buttons">', c += b.button.buildList(b.opts.imageEditButtons), c += "</div>";
                var d = {
                        buttons: c
                    },
                    e = b.popups.create("image.edit", d);
                return e
            }
            return !1
        }

        function r(a) {
            var c = b.popups.get("image.insert");
            if (c || (c = M()), c.find(".fr-layer.fr-active").removeClass("fr-active").addClass("fr-pactive"), c.find(".fr-image-progress-bar-layer").addClass("fr-active"), c.find(".fr-buttons").hide(), Da) {
                var d = za();
                b.popups.setContainer("image.insert", b.$sc);
                var e = d.offset().left + d.width() / 2,
                    f = d.offset().top + d.height();
                b.popups.show("image.insert", e, f, d.outerHeight())
            }
            "undefined" == typeof a && t(b.language.translate("Uploading"), 0)
        }

        function s(a) {
            var c = b.popups.get("image.insert");
            if (c && (c.find(".fr-layer.fr-pactive").addClass("fr-active").removeClass("fr-pactive"), c.find(".fr-image-progress-bar-layer").removeClass("fr-active"), c.find(".fr-buttons").show(), a || b.$el.find("img.fr-error").length)) {
                if (b.events.focus(), b.$el.find("img.fr-error").length && (b.$el.find("img.fr-error").remove(), b.undo.saveStep(), b.undo.run(), b.undo.dropRedo()), !b.$wp && Da) {
                    var d = Da;
                    ja(!0), b.selection.setAfter(d.get(0)), b.selection.restore()
                }
                b.popups.hide("image.insert")
            }
        }

        function t(a, c) {
            var d = b.popups.get("image.insert");
            if (d) {
                var e = d.find(".fr-image-progress-bar-layer");
                e.find("h3").text(a + (c ? " " + c + "%" : "")), e.removeClass("fr-error"), c ? (e.find("div").removeClass("fr-indeterminate"), e.find("div > span").css("width", c + "%")) : e.find("div").addClass("fr-indeterminate")
            }
        }

        function u(a) {
            r();
            var c = b.popups.get("image.insert"),
                d = c.find(".fr-image-progress-bar-layer");
            d.addClass("fr-error");
            var e = d.find("h3");
            e.text(a), b.events.disableBlur(), e.focus()
        }

        function v() {
            var a = b.popups.get("image.insert"),
                c = a.find(".fr-image-by-url-layer input");
            if (c.val().length > 0) {
                if (r(), t(b.language.translate("Loading image")), b.opts.imageUploadRemoteUrls && b.opts.imageCORSProxy) {
                    var d = new XMLHttpRequest;
                    d.open("GET", b.opts.imageCORSProxy + "/" + c.val(), !0), d.responseType = "blob", d.onload = function() {
                        200 == this.status && H([new Blob([this.response], {
                            type: "image/png"
                        })], Da)
                    }, d.send()
                } else y(c.val(), !0, [], Da);
                c.val(""), c.blur()
            }
        }

        function w(a) {
            ia.call(a.get(0))
        }

        function x() {
            var c = a(this);
            b.popups.hide("image.insert"), c.removeClass("fr-uploading"), c.next().is("br") && c.next().remove(), w(c), b.events.trigger("image.loaded", [c])
        }

        function y(a, c, d, e, f) {
            b.edit.off(), t(b.language.translate("Loading image")), c && (a = b.helpers.sanitizeURL(a));
            var g = new Image;
            g.onload = function() {
                var c, g;
                if (e) {
                    b.undo.canDo() || e.hasClass("fr-uploading") || b.undo.saveStep();
                    var h = e.data("fr-old-src");
                    e.data("fr-image-pasted") && (h = null), b.$wp ? (c = e.clone().removeData("fr-old-src").removeClass("fr-uploading").removeAttr("data-fr-image-pasted"), c.off("load"), h && e.attr("src", h), e.replaceWith(c)) : c = e;
                    for (var i = c.get(0).attributes, k = 0; k < i.length; k++) {
                        var l = i[k];
                        0 === l.nodeName.indexOf("data-") && c.removeAttr(l.nodeName)
                    }
                    if ("undefined" != typeof d)
                        for (g in d) d.hasOwnProperty(g) && "link" != g && c.attr("data-" + g, d[g]);
                    c.on("load", x), c.attr("src", a), b.edit.on(), j(!1), b.undo.saveStep(), b.$el.blur(), b.events.trigger(h ? "image.replaced" : "image.inserted", [c, f])
                } else c = E(a, d, x), j(!1), b.undo.saveStep(), b.$el.blur(), b.events.trigger("image.inserted", [c, f])
            }, g.onerror = function() {
                p(Ia)
            }, r(b.language.translate("Loading image")), g.src = a
        }

        function z(a) {
            try {
                if (b.events.trigger("image.uploaded", [a], !0) === !1) return b.edit.on(), !1;
                var c = JSON.parse(a);
                return c.link ? c : (p(Ja, a), !1)
            } catch (d) {
                return p(La, a), !1
            }
        }

        function A(c) {
            try {
                var d = a(c).find("Location").text(),
                    e = a(c).find("Key").text();
                return b.events.trigger("image.uploadedToS3", [d, e, c], !0) === !1 ? (b.edit.on(), !1) : d
            } catch (f) {
                return p(La, c), !1
            }
        }

        function B(a) {
            t(b.language.translate("Loading image"));
            var c = this.status,
                d = this.response,
                e = this.responseXML,
                f = this.responseText;
            try {
                if (b.opts.imageUploadToS3)
                    if (201 == c) {
                        var g = A(e);
                        g && y(g, !1, [], a, d || e)
                    } else p(La, d || e, a);
                else if (c >= 200 && c < 300) {
                    var h = z(f);
                    h && y(h.link, !1, h, a, d || f)
                } else p(Ka, d || f, a)
            } catch (i) {
                p(La, d || f, a)
            }
        }

        function C() {
            p(La, this.response || this.responseText || this.responseXML)
        }

        function D(a) {
            if (a.lengthComputable) {
                var c = a.loaded / a.total * 100 | 0;
                t(b.language.translate("Uploading"), c)
            }
        }

        function E(c, d, e) {
            var f, g = "";
            if (d && "undefined" != typeof d)
                for (f in d) d.hasOwnProperty(f) && "link" != f && (g += " data-" + f + '="' + d[f] + '"');
            var h = b.opts.imageDefaultWidth;
            h && "auto" != h && (h += b.opts.imageResizeWithPercent ? "%" : "px");
            var i = a('<img src="' + c + '"' + g + (h ? ' style="width: ' + h + ';"' : "") + ">");
            na(i, b.opts.imageDefaultDisplay, b.opts.imageDefaultAlign), i.on("load", e), i.on("error", function() {
                p(Pa)
            }), b.edit.on(), b.events.focus(!0), b.selection.restore(), b.undo.saveStep(), b.opts.imageSplitHTML ? b.markers.split() : b.markers.insert(), b.html.wrap();
            var j = b.$el.find(".fr-marker");
            return j.length ? (j.parent().is("hr") && j.parent().after(j), b.node.isLastSibling(j) && j.parent().hasClass("fr-deletable") && j.insertAfter(j.parent()), j.replaceWith(i)) : b.$el.append(i), b.selection.clear(), i
        }

        function F() {
            b.edit.on(), s(!0)
        }

        function G(c, d, e, f) {
            function g() {
                var e = a(this);
                e.off("load"), e.addClass("fr-uploading"), e.next().is("br") && e.next().remove(), b.placeholder.refresh(), w(e), k(), r(), b.edit.off(), c.onload = function() {
                    B.call(c, e)
                }, c.onerror = C, c.upload.onprogress = D, c.onabort = F, e.off("abortUpload").on("abortUpload", function() {
                    4 != c.readyState && c.abort()
                }), c.send(d)
            }
            var h, i = new FileReader;
            i.addEventListener("load", function() {
                var a = i.result;
                if (i.result.indexOf("svg+xml") < 0) {
                    for (var c = atob(i.result.split(",")[1]), d = [], e = 0; e < c.length; e++) d.push(c.charCodeAt(e));
                    a = window.URL.createObjectURL(new Blob([new Uint8Array(d)], {
                        type: "image/jpeg"
                    }))
                }
                f ? (f.on("load", g), f.one("error", function() {
                    f.off("load"), f.attr("src", f.data("fr-old-src")), p(Pa)
                }), b.edit.on(), b.undo.saveStep(), f.data("fr-old-src", f.attr("src")), f.attr("src", a)) : h = E(a, null, g)
            }, !1), i.readAsDataURL(e)
        }

        function H(a, c) {
            if ("undefined" != typeof a && a.length > 0) {
                if (b.events.trigger("image.beforeUpload", [a, c]) === !1) return !1;
                var d = a[0];
                if (d.name || (d.name = (new Date).getTime() + ".jpg"), d.size > b.opts.imageMaxSize) return p(Ma), !1;
                if (b.opts.imageAllowedTypes.indexOf(d.type.replace(/image\//g, "")) < 0) return p(Na), !1;
                var e;
                if (b.drag_support.formdata && (e = b.drag_support.formdata ? new FormData : null), e) {
                    var f;
                    if (b.opts.imageUploadToS3 !== !1) {
                        e.append("key", b.opts.imageUploadToS3.keyStart + (new Date).getTime() + "-" + (d.name || "untitled")), e.append("success_action_status", "201"), e.append("X-Requested-With", "xhr"), e.append("Content-Type", d.type);
                        for (f in b.opts.imageUploadToS3.params) b.opts.imageUploadToS3.params.hasOwnProperty(f) && e.append(f, b.opts.imageUploadToS3.params[f])
                    }
                    for (f in b.opts.imageUploadParams) b.opts.imageUploadParams.hasOwnProperty(f) && e.append(f, b.opts.imageUploadParams[f]);
                    e.append(b.opts.imageUploadParam, d, d.name);
                    var g = b.opts.imageUploadURL;
                    b.opts.imageUploadToS3 && (g = b.opts.imageUploadToS3.uploadURL ? b.opts.imageUploadToS3.uploadURL : "https://" + b.opts.imageUploadToS3.region + ".amazonaws.com/" + b.opts.imageUploadToS3.bucket);
                    var h = b.core.getXHR(g, b.opts.imageUploadMethod);
                    G(h, e, d, c || Da)
                }
            }
        }

        function I(c) {
            b.events.$on(c, "dragover dragenter", ".fr-image-upload-layer", function() {
                return a(this).addClass("fr-drop"), !1
            }, !0), b.events.$on(c, "dragleave dragend", ".fr-image-upload-layer", function() {
                return a(this).removeClass("fr-drop"), !1
            }, !0), b.events.$on(c, "drop", ".fr-image-upload-layer", function(d) {
                d.preventDefault(), d.stopPropagation(), a(this).removeClass("fr-drop");
                var e = d.originalEvent.dataTransfer;
                if (e && e.files) {
                    var f = c.data("instance") || b;
                    f.events.disableBlur(), f.image.upload(e.files), f.events.enableBlur()
                }
            }, !0), b.helpers.isIOS() && b.events.$on(c, "touchstart", '.fr-image-upload-layer input[type="file"]', function() {
                a(this).trigger("click")
            }, !0), b.events.$on(c, "change", '.fr-image-upload-layer input[type="file"]', function() {
                if (this.files) {
                    var d = c.data("instance") || b;
                    d.events.disableBlur(), c.find("input:focus").blur(), d.events.enableBlur(), d.image.upload(this.files, Da)
                }
                a(this).val("")
            }, !0)
        }

        function J(a) {
            if (a.is("img") && a.parents(".fr-img-caption").length > 0) return a.parents(".fr-img-caption")
        }

        function K(c) {
            var d = c.originalEvent.dataTransfer;
            if (d && d.files && d.files.length) {
                var e = d.files[0];
                if (e && e.type && e.type.indexOf("image") !== -1) {
                    if (!b.opts.imageUpload) return c.preventDefault(), c.stopPropagation(), !1;
                    b.markers.remove(), b.markers.insertAtPoint(c.originalEvent), b.$el.find(".fr-marker").replaceWith(a.FE.MARKERS), 0 === b.$el.find(".fr-marker").length && b.selection.setAtEnd(b.el), b.popups.hideAll();
                    var f = b.popups.get("image.insert");
                    f || (f = M()), b.popups.setContainer("image.insert", b.$sc);
                    var g = c.originalEvent.pageX,
                        h = c.originalEvent.pageY;
                    return b.opts.iframe && (h += b.$iframe.offset().top, g += b.$iframe.offset().left), b.popups.show("image.insert", g, h), r(), b.opts.imageAllowedTypes.indexOf(e.type.replace(/image\//g, "")) >= 0 ? (ja(!0), H(d.files)) : p(Na), c.preventDefault(), c.stopPropagation(), !1
                }
            }
        }

        function L() {
            b.events.$on(b.$el, b._mousedown, "IMG" == b.el.tagName ? null : 'img:not([contenteditable="false"])', function(c) {
                return "false" == a(this).parents("[contenteditable]:not(.fr-element):not(.fr-img-caption):not(body):first").attr("contenteditable") || (b.helpers.isMobile() || b.selection.clear(), Ha = !0, b.popups.areVisible() && b.events.disableBlur(), b.browser.msie && (b.events.disableBlur(), b.$el.attr("contenteditable", !1)), b.draggable || "touchstart" == c.type || c.preventDefault(), void c.stopPropagation())
            }), b.events.$on(b.$el, b._mouseup, "IMG" == b.el.tagName ? null : 'img:not([contenteditable="false"])', function(c) {
                return "false" == a(this).parents("[contenteditable]:not(.fr-element):not(.fr-img-caption):not(body):first").attr("contenteditable") || void(Ha && (Ha = !1, c.stopPropagation(), b.browser.msie && (b.$el.attr("contenteditable", !0), b.events.enableBlur())))
            }), b.events.on("keyup", function(c) {
                if (c.shiftKey && "" === b.selection.text().replace(/\n/g, "") && b.keys.isArrow(c.which)) {
                    var d = b.selection.element(),
                        e = b.selection.endElement();
                    d && "IMG" == d.tagName ? w(a(d)) : e && "IMG" == e.tagName && w(a(e))
                }
            }, !0), b.events.on("drop", K), b.events.on("element.beforeDrop", J), b.events.on("mousedown window.mousedown", ka), b.events.on("window.touchmove", la), b.events.on("mouseup window.mouseup", function() {
                return Da ? (ja(), !1) : void la()
            }), b.events.on("commands.mousedown", function(a) {
                a.parents(".fr-toolbar").length > 0 && ja()
            }), b.events.on("blur image.hideResizer commands.undo commands.redo element.dropped", function() {
                Ha = !1, ja(!0)
            }), b.events.on("modals.hide", function() {
                Da && (wa(), b.selection.clear())
            })
        }

        function M(a) {
            if (a) return b.popups.onRefresh("image.insert", c), b.popups.onHide("image.insert", f), !0;
            var d, e = "";
            b.opts.imageUpload || b.opts.imageInsertButtons.splice(b.opts.imageInsertButtons.indexOf("imageUpload"), 1), b.opts.imageInsertButtons.length > 1 && (e = '<div class="fr-buttons">' + b.button.buildList(b.opts.imageInsertButtons) + "</div>");
            var g = b.opts.imageInsertButtons.indexOf("imageUpload"),
                h = b.opts.imageInsertButtons.indexOf("imageByURL"),
                i = "";
            g >= 0 && (d = " fr-active", h >= 0 && g > h && (d = ""), i = '<div class="fr-image-upload-layer' + d + ' fr-layer" id="fr-image-upload-layer-' + b.id + '"><strong>' + b.language.translate("Drop image") + "</strong><br>(" + b.language.translate("or click") + ')<div class="fr-form"><input type="file" accept="image/' + b.opts.imageAllowedTypes.join(", image/").toLowerCase() + '" tabIndex="-1" aria-labelledby="fr-image-upload-layer-' + b.id + '" role="button"></div></div>');
            var j = "";
            h >= 0 && (d = " fr-active", g >= 0 && h > g && (d = ""), j = '<div class="fr-image-by-url-layer' + d + ' fr-layer" id="fr-image-by-url-layer-' + b.id + '"><div class="fr-input-line"><input id="fr-image-by-url-layer-text-' + b.id + '" type="text" placeholder="http://" tabIndex="1" aria-required="true"></div><div class="fr-action-buttons"><button type="button" class="fr-command fr-submit" data-cmd="imageInsertByURL" tabIndex="2" role="button">' + b.language.translate("Insert") + "</button></div></div>");
            var k = '<div class="fr-image-progress-bar-layer fr-layer"><h3 tabIndex="-1" class="fr-message">Uploading</h3><div class="fr-loader"><span class="fr-progress"></span></div><div class="fr-action-buttons"><button type="button" class="fr-command fr-dismiss" data-cmd="imageDismissError" tabIndex="2" role="button">OK</button></div></div>',
                l = {
                    buttons: e,
                    upload_layer: i,
                    by_url_layer: j,
                    progress_bar: k
                },
                m = b.popups.create("image.insert", l);
            return b.$wp && b.events.$on(b.$wp, "scroll", function() {
                Da && b.popups.isVisible("image.insert") && va()
            }), I(m), m
        }

        function N() {
            if (Da) {
                var a = b.popups.get("image.alt");
                a.find("input").val(Da.attr("alt") || "").trigger("change")
            }
        }

        function O() {
            var a = b.popups.get("image.alt");
            a || (a = P()), s(), b.popups.refresh("image.alt"), b.popups.setContainer("image.alt", b.$sc);
            var c = za();
            Ba() && (c = c.find(".fr-img-wrap"));
            var d = c.offset().left + c.outerWidth() / 2,
                e = c.offset().top + c.outerHeight();
            b.popups.show("image.alt", d, e, c.outerHeight())
        }

        function P(a) {
            if (a) return b.popups.onRefresh("image.alt", N), !0;
            var c = "";
            c = '<div class="fr-buttons">' + b.button.buildList(b.opts.imageAltButtons) + "</div>";
            var d = "";
            d = '<div class="fr-image-alt-layer fr-layer fr-active" id="fr-image-alt-layer-' + b.id + '"><div class="fr-input-line"><input id="fr-image-alt-layer-text-' + b.id + '" type="text" placeholder="' + b.language.translate("Alternate Text") + '" tabIndex="1"></div><div class="fr-action-buttons"><button type="button" class="fr-command fr-submit" data-cmd="imageSetAlt" tabIndex="2" role="button">' + b.language.translate("Update") + "</button></div></div>";
            var e = {
                    buttons: c,
                    alt_layer: d
                },
                f = b.popups.create("image.alt", e);
            return b.$wp && b.events.$on(b.$wp, "scroll.image-alt", function() {
                Da && b.popups.isVisible("image.alt") && O()
            }), f
        }

        function Q(a) {
            if (Da) {
                var c = b.popups.get("image.alt");
                Da.attr("alt", a || c.find("input").val() || ""), c.find("input:focus").blur(), w(Da)
            }
        }

        function R() {
            if (Da) {
                var a = b.popups.get("image.size");
                a.find('input[name="width"]').val(Da.get(0).style.width).trigger("change"), a.find('input[name="height"]').val(Da.get(0).style.height).trigger("change")
            }
        }

        function S() {
            var a = b.popups.get("image.size");
            a || (a = T()), s(), b.popups.refresh("image.size"), b.popups.setContainer("image.size", b.$sc);
            var c = za();
            Ba() && (c = c.find(".fr-img-wrap"));
            var d = c.offset().left + c.outerWidth() / 2,
                e = c.offset().top + c.outerHeight();
            b.popups.show("image.size", d, e, c.outerHeight())
        }

        function T(a) {
            if (a) return b.popups.onRefresh("image.size", R), !0;
            var c = "";
            c = '<div class="fr-buttons">' + b.button.buildList(b.opts.imageSizeButtons) + "</div>";
            var d = "";
            d = '<div class="fr-image-size-layer fr-layer fr-active" id="fr-image-size-layer-' + b.id + '"><div class="fr-image-group"><div class="fr-input-line"><input id="fr-image-size-layer-width-' + b.id + '" type="text" name="width" placeholder="' + b.language.translate("Width") + '" tabIndex="1"></div><div class="fr-input-line"><input id="fr-image-size-layer-height' + b.id + '" type="text" name="height" placeholder="' + b.language.translate("Height") + '" tabIndex="1"></div></div><div class="fr-action-buttons"><button type="button" class="fr-command fr-submit" data-cmd="imageSetSize" tabIndex="2" role="button">' + b.language.translate("Update") + "</button></div></div>";
            var e = {
                    buttons: c,
                    size_layer: d
                },
                f = b.popups.create("image.size", e);
            return b.$wp && b.events.$on(b.$wp, "scroll.image-size", function() {
                Da && b.popups.isVisible("image.size") && S()
            }), f
        }

        function U(a, c) {
            if (Da) {
                var d = b.popups.get("image.size");
                a = a || d.find('input[name="width"]').val() || "", c = c || d.find('input[name="height"]').val() || "";
                var e = /^[\d]+((px)|%)*$/g;
                a.match(e) ? Da.css("width", a) : Da.css("width", ""), c.match(e) ? Da.css("height", c) : Da.css("height", ""), Ba() && (a.match(e) ? Da.parent().css("width", a) : Da.parent().css("width", ""), c.match(e) ? Da.parent().css("height", c) : Da.parent().css("height", "")), d.find("input:focus").blur(), w(Da)
            }
        }

        function V(a) {
            var c, d, e = b.popups.get("image.insert");
            if (Da || b.opts.toolbarInline) {
                if (Da) {
                    var f = za();
                    Ba() && (f = f.find(".fr-img-wrap")), d = f.offset().top + f.outerHeight(), c = f.offset().left + f.outerWidth() / 2
                }
            } else {
                var g = b.$tb.find('.fr-command[data-cmd="insertImage"]');
                c = g.offset().left + g.outerWidth() / 2, d = g.offset().top + (b.opts.toolbarBottom ? 10 : g.outerHeight() - 10)
            }!Da && b.opts.toolbarInline && (d = e.offset().top - b.helpers.getPX(e.css("margin-top")), e.hasClass("fr-above") && (d += e.outerHeight())), e.find(".fr-layer").removeClass("fr-active"), e.find(".fr-" + a + "-layer").addClass("fr-active"), b.popups.show("image.insert", c, d, Da ? Da.outerHeight() : 0), b.accessibility.focusPopup(e)
        }

        function W(a) {
            var c = b.popups.get("image.insert");
            c.find(".fr-image-upload-layer").hasClass("fr-active") && a.addClass("fr-active").attr("aria-pressed", !0)
        }

        function X(a) {
            var c = b.popups.get("image.insert");
            c.find(".fr-image-by-url-layer").hasClass("fr-active") && a.addClass("fr-active").attr("aria-pressed", !0)
        }

        function Y(a, b, c, d) {
            return a.pageX = b, m.call(this, a), a.pageX = a.pageX + c * Math.floor(Math.pow(1.1, d)), n.call(this, a), o.call(this, a), ++d
        }

        function Z() {
            var c;
            if (b.shared.$image_resizer ? (Ea = b.shared.$image_resizer, Ga = b.shared.$img_overlay, b.events.on("destroy", function() {
                    Ea.removeClass("fr-active").appendTo(a("body:first"))
                }, !0)) : (b.shared.$image_resizer = a('<div class="fr-image-resizer"></div>'), Ea = b.shared.$image_resizer, b.events.$on(Ea, "mousedown", function(a) {
                    a.stopPropagation()
                }, !0), b.opts.imageResize && (Ea.append(l("nw") + l("ne") + l("sw") + l("se")), b.shared.$img_overlay = a('<div class="fr-image-overlay"></div>'), Ga = b.shared.$img_overlay, c = Ea.get(0).ownerDocument, a(c).find("body:first").append(Ga))), b.events.on("shared.destroy", function() {
                    Ea.html("").removeData().remove(), Ea = null, b.opts.imageResize && (Ga.remove(), Ga = null)
                }, !0), b.helpers.isMobile() || b.events.$on(a(b.o_win), "resize", function() {
                    Da && !Da.hasClass("fr-uploading") ? ja(!0) : Da && (k(), va(), r(!1))
                }), b.opts.imageResize) {
                c = Ea.get(0).ownerDocument, b.events.$on(Ea, b._mousedown, ".fr-handler", m), b.events.$on(a(c), b._mousemove, n), b.events.$on(a(c.defaultView || c.parentWindow), b._mouseup, o), b.events.$on(Ga, "mouseleave", o);
                var d = 1,
                    e = null,
                    f = 0;
                b.events.on("keydown", function(c) {
                    if (Da) {
                        var g = navigator.userAgent.indexOf("Mac OS X") != -1 ? c.metaKey : c.ctrlKey,
                            h = c.which;
                        (h !== e || c.timeStamp - f > 200) && (d = 1), (h == a.FE.KEYCODE.EQUALS || b.browser.mozilla && h == a.FE.KEYCODE.FF_EQUALS) && g && !c.altKey ? d = Y.call(this, c, 1, 1, d) : (h == a.FE.KEYCODE.HYPHEN || b.browser.mozilla && h == a.FE.KEYCODE.FF_HYPHEN) && g && !c.altKey ? d = Y.call(this, c, 2, -1, d) : b.keys.ctrlKey(c) || h != a.FE.KEYCODE.ENTER || (Da.before("<br>"), w(Da)), e = h, f = c.timeStamp
                    }
                }, !0), b.events.on("keyup", function() {
                    d = 1
                })
            }
        }

        function $(c) {
            c = c || za(), c && b.events.trigger("image.beforeRemove", [c]) !== !1 && (b.popups.hideAll(), wa(), ja(!0), b.undo.canDo() || b.undo.saveStep(), c.get(0) == b.el ? c.removeAttr("src") : ("A" == c.get(0).parentNode.tagName ? (b.selection.setBefore(c.get(0).parentNode) || b.selection.setAfter(c.get(0).parentNode) || c.parent().after(a.FE.MARKERS), a(c.get(0).parentNode).remove()) : (b.selection.setBefore(c.get(0)) || b.selection.setAfter(c.get(0)) || c.after(a.FE.MARKERS), c.remove()), b.html.fillEmptyBlocks(), b.selection.restore()), b.undo.saveStep())
        }

        function _(c) {
            var d = c.which;
            if (Da && (d == a.FE.KEYCODE.BACKSPACE || d == a.FE.KEYCODE.DELETE)) return c.preventDefault(), c.stopPropagation(), $(), !1;
            if (Da && d == a.FE.KEYCODE.ESC) {
                var e = Da;
                return ja(!0), b.selection.setAfter(e.get(0)), b.selection.restore(), c.preventDefault(), !1
            }
            if (Da && (d == a.FE.KEYCODE.ARROW_LEFT || d == a.FE.KEYCODE.ARROW_RIGHT)) {
                var f = Da.get(0);
                return ja(!0), d == a.FE.KEYCODE.ARROW_LEFT ? b.selection.setBefore(f) : b.selection.setAfter(f), b.selection.restore(), c.preventDefault(), !1
            }
            return Da && d != a.FE.KEYCODE.F10 && !b.keys.isBrowserAction(c) ? (c.preventDefault(), c.stopPropagation(), !1) : void 0
        }

        function aa(a) {
            if (a && "IMG" == a.tagName) b.node.hasClass(a, "fr-uploading") || b.node.hasClass(a, "fr-error") ? a.parentNode.removeChild(a) : b.node.hasClass(a, "fr-draggable") && a.classList.remove("fr-draggable");
            else if (a && a.nodeType == Node.ELEMENT_NODE)
                for (var c = a.querySelectorAll("img.fr-uploading, img.fr-error, img.fr-draggable"), d = 0; d < c.length; d++) aa(c[d])
        }

        function ba() {
            if (L(), "IMG" == b.el.tagName && b.$el.addClass("fr-view"), b.events.$on(b.$el, b.helpers.isMobile() && !b.helpers.isWindowsPhone() ? "touchend" : "click", "IMG" == b.el.tagName ? null : 'img:not([contenteditable="false"])', ia), b.helpers.isMobile() && (b.events.$on(b.$el, "touchstart", "IMG" == b.el.tagName ? null : 'img:not([contenteditable="false"])', function() {
                    Sa = !1
                }), b.events.$on(b.$el, "touchmove", function() {
                    Sa = !0
                })), b.$wp ? (b.events.on("window.keydown keydown", _, !0), b.events.on("keyup", function(b) {
                    if (Da && b.which == a.FE.KEYCODE.ENTER) return !1
                }, !0)) : b.events.$on(b.$win, "keydown", _), b.events.on("toolbar.esc", function() {
                    if (Da) {
                        if (b.$wp) b.events.disableBlur(), b.events.focus();
                        else {
                            var a = Da;
                            ja(!0), b.selection.setAfter(a.get(0)), b.selection.restore()
                        }
                        return !1
                    }
                }, !0), b.events.on("toolbar.focusEditor", function() {
                    if (Da) return !1
                }, !0), b.events.on("window.cut window.copy", function(a) {
                    Da && b.popups.isVisible("image.edit") && !b.popups.get("image.edit").find(":focus").length && (wa(), b.paste.saveCopiedText(Da.get(0).outerHTML, "\n"), "copy" == a.type ? setTimeout(function() {
                        w(Da)
                    }) : (ja(!0), b.undo.saveStep(), setTimeout(function() {
                        b.undo.saveStep()
                    }, 0)))
                }, !0), b.browser.msie && b.events.on("keydown", function(c) {
                    if (!b.selection.isCollapsed() || !Da) return !0;
                    var d = c.which;
                    d == a.FE.KEYCODE.C && b.keys.ctrlKey(c) ? b.events.trigger("window.copy") : d == a.FE.KEYCODE.X && b.keys.ctrlKey(c) && b.events.trigger("window.cut")
                }), b.events.$on(a(b.o_win), "keydown", function(b) {
                    var c = b.which;
                    if (Da && c == a.FE.KEYCODE.BACKSPACE) return b.preventDefault(), !1
                }), b.events.$on(b.$win, "keydown", function(b) {
                    var c = b.which;
                    Da && Da.hasClass("fr-uploading") && c == a.FE.KEYCODE.ESC && Da.trigger("abortUpload")
                }), b.events.on("destroy", function() {
                    Da && Da.hasClass("fr-uploading") && Da.trigger("abortUpload")
                }), b.events.on("paste.before", ga), b.events.on("paste.beforeCleanup", ha), b.events.on("paste.after", da), b.events.on("html.set", i), b.events.on("html.inserted", i), i(), b.events.on("destroy", function() {
                    Ra = []
                }), b.events.on("html.processGet", aa), b.opts.imageOutputSize) {
                var c;
                b.events.on("html.beforeGet", function() {
                    c = b.el.querySelectorAll("img");
                    for (var d = 0; d < c.length; d++) {
                        var e = c[d].style.width || a(c[d]).width(),
                            f = c[d].style.height || a(c[d]).height();
                        e && c[d].setAttribute("width", ("" + e).replace(/px/, "")), f && c[d].setAttribute("height", ("" + f).replace(/px/, ""))
                    }
                })
            }
            b.opts.iframe && b.events.on("image.loaded", b.size.syncIframe), b.$wp && (j(), b.events.on("contentChanged", j)), b.events.$on(a(b.o_win), "orientationchange.image", function() {
                setTimeout(function() {
                    Da && w(Da)
                }, 100)
            }), q(!0), M(!0), T(!0), P(!0), b.events.on("node.remove", function(a) {
                if ("IMG" == a.get(0).tagName) return $(a), !1
            })
        }

        function ca(c) {
            if (b.events.trigger("image.beforePasteUpload", [c]) === !1) return !1;
            Da = a(c), k(), e(), va(), r();
            for (var d = atob(a(c).attr("src").split(",")[1]), f = [], g = 0; g < d.length; g++) f.push(d.charCodeAt(g));
            var h = new Blob([new Uint8Array(f)], {
                type: "image/jpeg"
            });
            H([h], Da)
        }

        function da() {
            b.opts.imagePaste ? b.$el.find("img[data-fr-image-pasted]").each(function(c, d) {
                if (b.opts.imagePasteProcess) {
                    var e = b.opts.imageDefaultWidth;
                    e && "auto" != e && (e += b.opts.imageResizeWithPercent ? "%" : "px"), a(d).css("width", e).removeClass("fr-dii fr-dib fr-fir fr-fil").addClass((b.opts.imageDefaultDisplay ? "fr-di" + b.opts.imageDefaultDisplay[0] : "") + (b.opts.imageDefaultAlign && "center" != b.opts.imageDefaultAlign ? " fr-fi" + b.opts.imageDefaultAlign[0] : ""))
                }
                if (0 === d.src.indexOf("data:")) ca(d);
                else if (0 === d.src.indexOf("blob:") || 0 === d.src.indexOf("http") && b.opts.imageUploadRemoteUrls && b.opts.imageCORSProxy) {
                    var f = new Image;
                    f.crossOrigin = "Anonymous", f.onload = function() {
                        var a = b.o_doc.createElement("CANVAS"),
                            c = a.getContext("2d");
                        a.height = this.naturalHeight, a.width = this.naturalWidth, c.drawImage(this, 0, 0), d.src = a.toDataURL("image/png"), ca(d)
                    }, f.src = (0 === d.src.indexOf("blob:") ? "" : b.opts.imageCORSProxy + "/") + d.src
                } else 0 !== d.src.indexOf("http") || 0 === d.src.indexOf("https://mail.google.com/mail") ? (b.selection.save(), a(d).remove(), b.selection.restore()) : a(d).removeAttr("data-fr-image-pasted")
            }) : b.$el.find("img[data-fr-image-pasted]").remove()
        }

        function ea(a) {
            var c = a.target.result,
                d = b.opts.imageDefaultWidth;
            d && "auto" != d && (d += b.opts.imageResizeWithPercent ? "%" : "px"), b.html.insert('<img data-fr-image-pasted="true" class="' + (b.opts.imageDefaultDisplay ? "fr-di" + b.opts.imageDefaultDisplay[0] : "") + (b.opts.imageDefaultAlign && "center" != b.opts.imageDefaultAlign ? " fr-fi" + b.opts.imageDefaultAlign[0] : "") + '" src="' + c + '"' + (d ? ' style="width: ' + d + ';"' : "") + ">"), b.events.trigger("paste.after")
        }

        function fa(a) {
            var b = new FileReader;
            b.onload = ea, b.readAsDataURL(a)
        }

        function ga(a) {
            if (a && a.clipboardData && a.clipboardData.items) {
                var b = null;
                if (a.clipboardData.getData("text/rtf")) b = a.clipboardData.items[0].getAsFile();
                else
                    for (var c = 0; c < a.clipboardData.items.length && !(b = a.clipboardData.items[c].getAsFile()); c++);
                if (b) return fa(b), !1
            }
        }

        function ha(a) {
            return a = a.replace(/<img /gi, '<img data-fr-image-pasted="true" ')
        }

        function ia(c) {
            if ("false" == a(this).parents("[contenteditable]:not(.fr-element):not(.fr-img-caption):not(body):first").attr("contenteditable")) return !0;
            if (c && "touchend" == c.type && Sa) return !0;
            if (c && b.edit.isDisabled()) return c.stopPropagation(), c.preventDefault(), !1;
            for (var d = 0; d < a.FE.INSTANCES.length; d++) a.FE.INSTANCES[d] != b && a.FE.INSTANCES[d].events.trigger("image.hideResizer");
            b.toolbar.disable(), c && (c.stopPropagation(), c.preventDefault()), b.helpers.isMobile() && (b.events.disableBlur(), b.$el.blur(), b.events.enableBlur()), b.opts.iframe && b.size.syncIframe(), Da = a(this), b.browser.msie || wa(), k(), e(), b.browser.msie || b.selection.clear(), b.helpers.isIOS() && (b.events.disableBlur(), b.$el.blur()), b.button.bulkRefresh(), b.events.trigger("video.hideResizer")
        }

        function ja(a) {
            Da && (ma() || a === !0) && (b.toolbar.enable(), Ea.removeClass("fr-active"), b.popups.hide("image.edit"), Da = null, la(), Ga.hide())
        }

        function ka() {
            Ta = !0
        }

        function la() {
            Ta = !1
        }

        function ma() {
            return Ta
        }

        function na(a, c, d) {
            !b.opts.htmlUntouched && b.opts.useClasses ? (a.removeClass("fr-fil fr-fir fr-dib fr-dii"), d && a.addClass("fr-fi" + d[0]), c && a.addClass("fr-di" + c[0])) : "inline" == c ? (a.css({
                display: "inline-block",
                verticalAlign: "bottom",
                margin: b.opts.imageDefaultMargin
            }), "center" == d ? a.css({
                float: "none",
                marginBottom: "",
                marginTop: "",
                maxWidth: "calc(100% - " + 2 * b.opts.imageDefaultMargin + "px)"
            }) : "left" == d ? a.css({
                float: "left",
                marginLeft: 0,
                maxWidth: "calc(100% - " + b.opts.imageDefaultMargin + "px)"
            }) : a.css({
                float: "right",
                marginRight: 0,
                maxWidth: "calc(100% - " + b.opts.imageDefaultMargin + "px)"
            })) : "block" == c && (a.css({
                display: "block",
                float: "none",
                verticalAlign: "top",
                margin: b.opts.imageDefaultMargin + "px auto"
            }), "left" == d ? a.css({
                marginLeft: 0
            }) : "right" == d && a.css({
                marginRight: 0
            }))
        }

        function oa(a) {
            var c = za();
            c.removeClass("fr-fir fr-fil"), !b.opts.htmlUntouched && b.opts.useClasses ? "left" == a ? c.addClass("fr-fil") : "right" == a && c.addClass("fr-fir") : na(c, qa(), a), wa(), k(), e(), b.selection.clear()
        }

        function pa(a) {
            if ("undefined" == typeof a && (a = za()), a) {
                if (a.hasClass("fr-fil")) return "left";
                if (a.hasClass("fr-fir")) return "right";
                if (a.hasClass("fr-dib") || a.hasClass("fr-dii")) return "center";
                var b = a.css("float");
                if (a.css("float", "'none'"), "block" == a.css("display")) {
                    if (a.css("float", ""), a.css("float") != b && a.css("float", b), 0 === parseInt(a.css("margin-left"), 10)) return "left";
                    if (0 === parseInt(a.css("margin-right"), 10)) return "right"
                } else {
                    if (a.css("float", ""), a.css("float") != b && a.css("float", b), "left" == a.css("float")) return "left";
                    if ("right" == a.css("float")) return "right"
                }
            }
            return "center"
        }

        function qa(a) {
            "undefined" == typeof a && (a = za());
            var b = a.css("float");
            return a.css("float", "'none'"), "block" == a.css("display") ? (a.css("float", ""), a.css("float") != b && a.css("float", b), "block") : (a.css("float", ""), a.css("float") != b && a.css("float", b), "inline")
        }

        function ra(a) {
            Da && a.find("> *:first").replaceWith(b.icon.create("image-align-" + pa()))
        }

        function sa(a, b) {
            Da && b.find('.fr-command[data-param1="' + pa() + '"]').addClass("fr-active").attr("aria-selected", !0)
        }

        function ta(a) {
            var c = za();
            c.removeClass("fr-dii fr-dib"), !b.opts.htmlUntouched && b.opts.useClasses ? "inline" == a ? c.addClass("fr-dii") : "block" == a && c.addClass("fr-dib") : na(c, a, pa()), wa(), k(), e(), b.selection.clear()
        }

        function ua(a, b) {
            Da && b.find('.fr-command[data-param1="' + qa() + '"]').addClass("fr-active").attr("aria-selected", !0)
        }

        function va() {
            var a = b.popups.get("image.insert");
            a || (a = M()), b.popups.isVisible("image.insert") || (s(), b.popups.refresh("image.insert"), b.popups.setContainer("image.insert", b.$sc));
            var c = za();
            Ba() && (c = c.find(".fr-img-wrap"));
            var d = c.offset().left + c.outerWidth() / 2,
                e = c.offset().top + c.outerHeight();
            b.popups.show("image.insert", d, e, c.outerHeight(!0))
        }

        function wa() {
            if (Da) {
                b.events.disableBlur(), b.selection.clear();
                var a = b.doc.createRange();
                a.selectNode(Da.get(0));
                var c = b.selection.get();
                c.addRange(a), b.events.enableBlur()
            }
        }

        function xa() {
            Da ? (b.events.disableBlur(), a(".fr-popup input:focus").blur(), w(Da)) : (b.events.disableBlur(), b.selection.restore(), b.events.enableBlur(), b.popups.hide("image.insert"), b.toolbar.showInline())
        }

        function ya() {
            return Da
        }

        function za() {
            return Ba() ? Da.parents(".fr-img-caption:first") : Da
        }

        function Aa(a, c, d) {
            if ("undefined" == typeof c && (c = b.opts.imageStyles), "undefined" == typeof d && (d = b.opts.imageMultipleStyles), !Da) return !1;
            var e = za();
            if (!d) {
                var f = Object.keys(c);
                f.splice(f.indexOf(a), 1), e.removeClass(f.join(" "))
            }
            "object" == typeof c[a] ? (e.removeAttr("style"), e.css(c[a].style)) : e.toggleClass(a), w(e)
        }

        function Ba() {
            return !!Da && Da.parents(".fr-img-caption").length > 0
        }

        function Ca() {
            var c;
            Da && !Ba() ? (c = Da, Da.parent().is("a") && (c = Da.parent()), c.wrap('<span contenteditable="false" class="fr-img-caption ' + Da.attr("class") + '" draggable="false"></span>'), c.wrap('<span class="fr-img-wrap"></span>'), c.after('<span class="fr-inner" contenteditable="true">' + a.FE.START_MARKER + "Image caption" + a.FE.END_MARKER + "</span>"), Da.removeAttr("class"), Da.parent().css("width", Da.width()), ja(!0), b.selection.restore()) : (c = za(), Da.insertAfter(c), Da.attr("class", c.attr("class").replace("fr-img-caption", "")), c.remove(), w(Da))
        }
        var Da, Ea, Fa, Ga, Ha = !1,
            Ia = 1,
            Ja = 2,
            Ka = 3,
            La = 4,
            Ma = 5,
            Na = 6,
            Oa = 7,
            Pa = 8,
            Qa = {};
        Qa[Ia] = "Image cannot be loaded from the passed link.", Qa[Ja] = "No link in upload response.", Qa[Ka] = "Error during file upload.", Qa[La] = "Parsing response failed.", Qa[Ma] = "File is too large.", Qa[Na] = "Image file type is invalid.", Qa[Oa] = "Files can be uploaded only to same domain in IE 8 and IE 9.", Qa[Pa] = "Image file is corrupted.";
        var Ra, Sa, Ta = !1;
        return {
            _init: ba,
            showInsertPopup: d,
            showLayer: V,
            refreshUploadButton: W,
            refreshByURLButton: X,
            upload: H,
            insertByURL: v,
            align: oa,
            refreshAlign: ra,
            refreshAlignOnShow: sa,
            display: ta,
            refreshDisplayOnShow: ua,
            replace: va,
            back: xa,
            get: ya,
            getEl: za,
            insert: y,
            showProgressBar: r,
            remove: $,
            hideProgressBar: s,
            applyStyle: Aa,
            showAltPopup: O,
            showSizePopup: S,
            setAlt: Q,
            setSize: U,
            toggleCaption: Ca,
            hasCaption: Ba,
            exitEdit: ja,
            edit: w
        }
    }, a.FE.DefineIcon("insertImage", {
        NAME: "image"
    }), a.FE.RegisterShortcut(a.FE.KEYCODE.P, "insertImage", null, "P"), a.FE.RegisterCommand("insertImage", {
        title: "Insert Image",
        undo: !1,
        focus: !0,
        refreshAfterCallback: !1,
        popup: !0,
        callback: function() {
            this.popups.isVisible("image.insert") ? (this.$el.find(".fr-marker").length && (this.events.disableBlur(), this.selection.restore()), this.popups.hide("image.insert")) : this.image.showInsertPopup()
        },
        plugin: "image"
    }), a.FE.DefineIcon("imageUpload", {
        NAME: "upload"
    }), a.FE.RegisterCommand("imageUpload", {
        title: "Upload Image",
        undo: !1,
        focus: !1,
        toggle: !0,
        callback: function() {
            this.image.showLayer("image-upload")
        },
        refresh: function(a) {
            this.image.refreshUploadButton(a)
        }
    }), a.FE.DefineIcon("imageByURL", {
        NAME: "link"
    }), a.FE.RegisterCommand("imageByURL", {
        title: "By URL",
        undo: !1,
        focus: !1,
        toggle: !0,
        callback: function() {
            this.image.showLayer("image-by-url")
        },
        refresh: function(a) {
            this.image.refreshByURLButton(a)
        }
    }), a.FE.RegisterCommand("imageInsertByURL", {
        title: "Insert Image",
        undo: !0,
        refreshAfterCallback: !1,
        callback: function() {
            this.image.insertByURL()
        },
        refresh: function(a) {
            var b = this.image.get();
            b ? a.text(this.language.translate("Replace")) : a.text(this.language.translate("Insert"))
        }
    }), a.FE.DefineIcon("imageDisplay", {
        NAME: "star"
    }), a.FE.RegisterCommand("imageDisplay", {
        title: "Display",
        type: "dropdown",
        options: {
            inline: "Inline",
            block: "Break Text"
        },
        callback: function(a, b) {
            this.image.display(b)
        },
        refresh: function(a) {
            this.opts.imageTextNear || a.addClass("fr-hidden")
        },
        refreshOnShow: function(a, b) {
            this.image.refreshDisplayOnShow(a, b)
        }
    }), a.FE.DefineIcon("image-align", {
        NAME: "align-left"
    }), a.FE.DefineIcon("image-align-left", {
        NAME: "align-left"
    }), a.FE.DefineIcon("image-align-right", {
        NAME: "align-right"
    }), a.FE.DefineIcon("image-align-center", {
        NAME: "align-justify"
    }), a.FE.DefineIcon("imageAlign", {
        NAME: "align-justify"
    }), a.FE.RegisterCommand("imageAlign", {
        type: "dropdown",
        title: "Align",
        options: {
            left: "Align Left",
            center: "None",
            right: "Align Right"
        },
        html: function() {
            var b = '<ul class="fr-dropdown-list" role="presentation">',
                c = a.FE.COMMANDS.imageAlign.options;
            for (var d in c) c.hasOwnProperty(d) && (b += '<li role="presentation"><a class="fr-command fr-title" tabIndex="-1" role="option" data-cmd="imageAlign" data-param1="' + d + '" title="' + this.language.translate(c[d]) + '">' + this.icon.create("image-align-" + d) + '<span class="fr-sr-only">' + this.language.translate(c[d]) + "</span></a></li>");
            return b += "</ul>"
        },
        callback: function(a, b) {
            this.image.align(b)
        },
        refresh: function(a) {
            this.image.refreshAlign(a)
        },
        refreshOnShow: function(a, b) {
            this.image.refreshAlignOnShow(a, b)
        }
    }), a.FE.DefineIcon("imageReplace", {
        NAME: "exchange"
    }), a.FE.RegisterCommand("imageReplace", {
        title: "Replace",
        undo: !1,
        focus: !1,
        popup: !0,
        refreshAfterCallback: !1,
        callback: function() {
            this.image.replace()
        }
    }), a.FE.DefineIcon("imageRemove", {
        NAME: "trash"
    }), a.FE.RegisterCommand("imageRemove", {
        title: "Remove",
        callback: function() {
            this.image.remove()
        }
    }), a.FE.DefineIcon("imageBack", {
        NAME: "arrow-left"
    }), a.FE.RegisterCommand("imageBack", {
        title: "Back",
        undo: !1,
        focus: !1,
        back: !0,
        callback: function() {
            this.image.back()
        },
        refresh: function(a) {
            var b = this.image.get();
            b || this.opts.toolbarInline ? (a.removeClass("fr-hidden"), a.next(".fr-separator").removeClass("fr-hidden")) : (a.addClass("fr-hidden"), a.next(".fr-separator").addClass("fr-hidden"))
        }
    }), a.FE.RegisterCommand("imageDismissError", {
        title: "OK",
        undo: !1,
        callback: function() {
            this.image.hideProgressBar(!0)
        }
    }), a.FE.DefineIcon("imageStyle", {
        NAME: "magic"
    }), a.FE.RegisterCommand("imageStyle", {
        title: "Style",
        type: "dropdown",
        html: function() {
            var a = '<ul class="fr-dropdown-list" role="presentation">',
                b = this.opts.imageStyles;
            for (var c in b)
                if (b.hasOwnProperty(c)) {
                    var d = b[c];
                    "object" == typeof d && (d = d.title), a += '<li role="presentation"><a class="fr-command" tabIndex="-1" role="option" data-cmd="imageStyle" data-param1="' + c + '">' + this.language.translate(d) + "</a></li>"
                }
            return a += "</ul>"
        },
        callback: function(a, b) {
            this.image.applyStyle(b)
        },
        refreshOnShow: function(b, c) {
            var d = this.image.getEl();
            d && c.find(".fr-command").each(function() {
                var b = a(this).data("param1"),
                    c = d.hasClass(b);
                a(this).toggleClass("fr-active", c).attr("aria-selected", c)
            })
        }
    }), a.FE.DefineIcon("imageAlt", {
        NAME: "info"
    }), a.FE.RegisterCommand("imageAlt", {
        undo: !1,
        focus: !1,
        popup: !0,
        title: "Alternate Text",
        callback: function() {
            this.image.showAltPopup()
        }
    }), a.FE.RegisterCommand("imageSetAlt", {
        undo: !0,
        focus: !1,
        title: "Update",
        refreshAfterCallback: !1,
        callback: function() {
            this.image.setAlt()
        }
    }), a.FE.DefineIcon("imageSize", {
        NAME: "arrows-alt"
    }), a.FE.RegisterCommand("imageSize", {
        undo: !1,
        focus: !1,
        popup: !0,
        title: "Change Size",
        callback: function() {
            this.image.showSizePopup()
        }
    }), a.FE.RegisterCommand("imageSetSize", {
        undo: !0,
        focus: !1,
        title: "Update",
        refreshAfterCallback: !1,
        callback: function() {
            this.image.setSize()
        }
    }), a.FE.DefineIcon("imageCaption", {
        NAME: "commenting"
    }), a.FE.RegisterCommand("imageCaption", {
        undo: !0,
        focus: !1,
        title: "Image Caption",
        refreshAfterCallback: !0,
        callback: function() {
            this.image.toggleCaption()
        },
        refresh: function(a) {
            this.image.get() && a.toggleClass("fr-active", this.image.hasCaption())
        }
    })
});