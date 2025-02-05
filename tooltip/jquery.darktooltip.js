(function (b) {
    function a(d, c) {
        this.bearer = d;
        this.options = c;
        this.hideEvent;
        this.mouseOverMode = this.options.trigger == "hover" || this.options.trigger == "mouseover" || this.options.trigger == "onmouseover";
    }
    a.prototype = {
        show: function () {
            var c = this;
            this.tooltip.css("display", "block");
            if (c.mouseOverMode) {
                this.tooltip.mouseover(function () {
                    clearTimeout(c.hideEvent);
                });
                this.tooltip.mouseout(function () {
                    clearTimeout(c.hideEvent);
                    c.hide();
                });
            }
        },
        hide: function () {
            var c = this;
            this.hideEvent = setTimeout(function () {
                c.tooltip.hide();
            }, 100);
        },
        toggle: function () {
            if (this.tooltip.is(":visible")) {
                this.hide();
            } else {
                this.show();
            }
        },
        addAnimation: function () {
            switch (this.options.animation) {
                case "none":
                    break;
                case "fadeIn":
                    this.tooltip.addClass("animated");
                    this.tooltip.addClass("fadeIn");
                    break;
                case "flipIn":
                    this.tooltip.addClass("animated");
                    this.tooltip.addClass("flipIn");
                    break;
            }
        },
        setContent: function () {
            b(this.bearer).css("cursor", "pointer");
            if (this.options.content) {
                this.content = this.options.content;
            } else {
                if (this.bearer.attr("data-tooltip")) {
                    this.content = this.bearer.attr("data-tooltip");
                } else {
                    return;
                }
            }
            if (this.content.charAt(0) == "#") {
                b(this.content).hide();
                this.content = b(this.content).html();
                this.contentType = "html";
            } else {
                this.contentType = "text";
            }
            this.tooltip = b("<ins class = 'dark-tooltip " + this.options.theme + " " + this.options.size + " " + this.options.gravity + "'><div>" + this.content + "</div><div class = 'tip'></div></ins>");
            this.tip = this.tooltip.find(".tip");
            b("body").append(this.tooltip);
            if (this.contentType == "html") {
                this.tooltip.css("max-width", "none");
            }
            this.tooltip.css("opacity", this.options.opacity);
            this.addAnimation();
            if (this.options.confirm) {
                this.addConfirm();
            }
        },
        setPositions: function () {
            var d = this.bearer.offset().left;
            var c = this.bearer.offset().top;
            switch (this.options.gravity) {
                case "south":
                    d += this.bearer.outerWidth() / 2 - this.tooltip.outerWidth() / 2;
                    c += -this.tooltip.outerHeight() - this.tip.outerHeight() / 2;
                    break;
                case "west":
                    d += this.bearer.outerWidth() + this.tip.outerWidth() / 2;
                    c += this.bearer.outerHeight() / 2 - this.tooltip.outerHeight() / 2;
                    break;
                case "north":
                    d += this.bearer.outerWidth() / 2 - this.tooltip.outerWidth() / 2;
                    c += this.bearer.outerHeight() + this.tip.outerHeight() / 2;
                    break;
                case "east":
                    d += -this.tooltip.outerWidth() - this.tip.outerWidth() / 2;
                    c += this.bearer.outerHeight() / 2 - this.tooltip.outerHeight() / 2;
                    break;
            }
            this.tooltip.css("left", d);
            this.tooltip.css("top", c);
        },
        setEvents: function () {
            var c = this;
            if (c.mouseOverMode) {
                this.bearer
                    .mouseover(function () {
                        c.setPositions();
                        c.show();
                    })
                    .mouseout(function () {
                        c.hide();
                    });
            } else {
                if (this.options.trigger == "click" || this.options.trigger == "onclik") {
                    this.tooltip.click(function (d) {
                        d.stopPropagation();
                    });
                    this.bearer.click(function (d) {
                        d.preventDefault();
                        c.setPositions();
                        c.toggle();
                        d.stopPropagation();
                    });
                    b("html").click(function () {
                        c.hide();
                    });
                }
            }
        },
        activate: function () {
            this.setContent();
            if (this.content) {
                this.setEvents();
            }
        },
        addConfirm: function () {
            this.tooltip.append("<ul class = 'confirm'><li class = 'darktooltip-yes'>" + this.options.yes + "</li><li class = 'darktooltip-no'>" + this.options.no + "</li></ul>");
            this.setConfirmEvents();
        },
        setConfirmEvents: function () {
            var c = this;
            this.tooltip.find("li.darktooltip-yes").click(function (d) {
                c.onYes();
                d.stopPropagation();
            });
            this.tooltip.find("li.darktooltip-no").click(function (d) {
                c.onNo();
                d.stopPropagation();
            });
        },
        finalMessage: function () {
            if (this.options.finalMessage) {
                var c = this;
                c.tooltip.find("div:first").html(this.options.finalMessage);
                c.tooltip.find("ul").remove();
                c.setPositions();
                setTimeout(function () {
                    c.hide();
                    c.setContent();
                }, c.options.finalMessageDuration);
            } else {
                this.hide();
            }
        },
        onYes: function () {
            this.options.onYes(this.bearer);
            this.finalMessage();
        },
        onNo: function () {
            this.options.onNo(this.bearer);
            this.hide();
        },
    };
    b.fn.darkTooltip = function (c) {
        this.each(function () {
            c = b.extend({}, b.fn.darkTooltip.defaults, c);
            var d = new a(b(this), c);
            d.activate();
        });
    };
    b.fn.darkTooltip.defaults = {
        opacity: 1,
        content: "",
        size: "medium",
        gravity: "south",
        theme: "dark",
        trigger: "hover",
        animation: "none",
        confirm: false,
        yes: "Yes",
        no: "No",
        finalMessage: "",
        finalMessageDuration: 1000,
        onYes: function () {},
        onNo: function () {},
    };
})(jQuery);
