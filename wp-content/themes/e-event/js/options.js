(function () {

    "use strict";

    var matched, browser;

    // Use of jQuery.browser is frowned upon.
    // More details: http://api.jquery.com/jQuery.browser
    // jQuery.uaMatch maintained for back-compat
    jQuery.uaMatch = function (ua) {
        ua = ua.toLowerCase();

        var match = /(chrome)[ \/]([\w.]+)/.exec(ua) ||
            /(webkit)[ \/]([\w.]+)/.exec(ua) ||
            /(opera)(?:.*version|)[ \/]([\w.]+)/.exec(ua) ||
            /(msie) ([\w.]+)/.exec(ua) ||
            ua.indexOf("compatible") < 0 && /(mozilla)(?:.*? rv:([\w.]+)|)/.exec(ua) || [];

        return {
            browser: match[1] || "",
            version: match[2] || "0"
        };
    };

    matched = jQuery.uaMatch(navigator.userAgent);
    browser = {};

    if (matched.browser) {
        browser[matched.browser] = true;
        browser.version = matched.version;
    }

    // Chrome is Webkit, but Webkit is also Safari.
    if (browser.chrome) {
        browser.webkit = true;
    } else if (browser.webkit) {
        browser.safari = true;
    }

    jQuery.browser = browser;

    jQuery.sub = function () {
        function jQuerySub(selector, context) {
            return new jQuerySub.fn.init(selector, context);
        }
        jQuery.extend(true, jQuerySub, this);
        jQuerySub.superclass = this;
        jQuerySub.fn = jQuerySub.prototype = this();
        jQuerySub.fn.constructor = jQuerySub;
        jQuerySub.sub = this.sub;
        jQuerySub.fn.init = function init(selector, context) {
            if (context && context instanceof jQuery && !(context instanceof jQuerySub)) {
                context = jQuerySub(context);
            }

            return jQuery.fn.init.call(this, selector, context, rootjQuerySub);
        };
        jQuerySub.fn.init.prototype = jQuerySub.fn;
        var rootjQuerySub = jQuerySub(document);
        return jQuerySub;
    };

})();

/* =================Twitter============================ */
var load_twitter = function () {
    "use strict";
    var linkify = function (text) {
        text = text.replace(/(https?:\/\/\S+)/gi, function (s) {
            return '<a href="' + s + '">' + s + '</a>';
        });
        text = text.replace(/(^|)@(\w+)/gi, function (s) {
            return '<a href="http://twitter.com/' + s + '">' + s + '</a>';
        });
        text = text.replace(/(^|)#(\w+)/gi, function (s) {
            return '<a href="http://search.twitter.com/search?q=' + s.replace(/#/, '%23') + '">' + s + '</a>';
        });
        return text;
    };
    jQuery('.twitter_widget').each(function () {
        var t = jQuery(this);
        var t_date_obj = new Date();
        var t_loading = 'Loading tweets..'; //message to display before loading tweets
        var t_container = jQuery('<ul>').addClass('twitter').append('<li>' + t_loading + '</li>');
        t.append(t_container);
        var t_user = t.attr('data-user');
        var t_posts = parseInt(t.attr('data-posts'), 10);
        jQuery.getJSON("php/twitter.php?user=" + t_user, function (t_tweets) {
            t_container.empty();
            for (var i = 0; i < t_posts && i < t_tweets.length; i++) {
                var t_date = Math.floor((t_date_obj.getTime() - Date.parse(t_tweets[i].created_at)) / 1000);
                var t_date_str;
                var t_date_seconds = t_date % 60;
                t_date = Math.floor(t_date / 60);
                var t_date_minutes = t_date % 60;
                if (t_date_minutes) {
                    t_date = Math.floor(t_date / 60);
                    var t_date_hours = t_date % 60;
                    if (t_date_hours) {
                        t_date = Math.floor(t_date / 60);
                        var t_date_days = t_date % 24;
                        if (t_date_days) {
                            t_date = Math.floor(t_date / 24);
                            var t_date_weeks = t_date % 7;
                            if (t_date_weeks)
                                t_date_str = t_date_weeks + ' week' + (1 == t_date_weeks ? '' : 's') + ' ago';
                            else
                                t_date_str = t_date_days + ' day' + (1 == t_date_days ? '' : 's') + ' ago';
                        } else
                            t_date_str = t_date_hours + ' hour' + (1 == t_date_hours ? '' : 's') + ' ago';
                    } else
                        t_date_str = t_date_minutes + ' minute' + (1 == t_date_minutes ? '' : 's') + ' ago';
                } else
                    t_date_str = t_date_seconds + ' second' + (1 == t_date_seconds ? '' : 's') + ' ago';
                var t_message =
                    '<li>' +
                    linkify(t_tweets[i].text) +
                    '<span>' +
                    t_date_str +
                    '</span>' +
                    '</li>';
                t_container.append(t_message);
            }
        });
    });
};
//load modules-------------

/*  SCROOL TOP  */
jQuery(document).ready(function () {
    "use strict";

    jQuery('.scroll-top').click(function () {
        jQuery('body,html').animate({
            scrollTop: 0
        }, 1200, 'swing');
        return false;
    });

    jQuery(function() {
        if(jQuery('.sticky-bar').length) {
            jQuery(".sticky-bar").sticky({topSpacing:0});       
        }
    });

    jQuery(".responsive-menu").click(function (e) {
        jQuery(".main-nav>ul").toggle();
        e.stopPropagation();
        if (e.preventDefault)
            e.preventDefault();
        return false;
    });
    jQuery("body").click(function () {
        jQuery(".main-nav>ul").hide();
    });

    if (!Array.prototype.indexOf) {
        Array.prototype.indexOf = function (obj, start) {
            for (var i = (start || 0), j = this.length; i < j; i++) {
                if (this[i] === obj) {
                    return i;
                }
            }
            return -1;
        };
    }
    /* GALLERY IMAGE ZOOM */
    jQuery(".swipebox").swipebox();

    jQuery('input[placeholder], textarea[placeholder]').placeholder();

    load_twitter();

    jQuery('header .right-box .fa-search').on('click', function () {
            jQuery('.search-container').addClass('open');
    });
    jQuery('.search-container .close-icon').on('click', function () {
            jQuery('.search-container').removeClass('open');
    });

    jQuery('.search-container .search-box .search-form .search-input').keyup(function () {
        var text_val = jQuery(this).val();
        if (text_val === "") {
            jQuery('.search-container .search-box .search-form').removeClass('has-value');
        } else {
            jQuery('.search-container .search-box .search-form').addClass('has-value');
        }
    });

    jQuery('.the-countdown').each(function(){
        var cd_duedate = jQuery(this).attr('data-duedate');
        var cd_start = new Date().getTime();
        var cd_end = new Date(cd_duedate).getTime();

        jQuery(this).countdown(cd_duedate, function(event) {
            var $this = jQuery(this);
            // Total days
            var days = Math.round(Math.abs((cd_start - cd_end))/(24*60*60*1000));
            var divider = {
                'seconds':60,
                'minutes':60,
                'hours':24
            };
            var progress = null;
            switch (event.type) {
                case "seconds":
                case "minutes":
                case "hours":
                case "days":
                case "weeks":
                case "daysLeft":
                    $this.find('#' + event.type).html(event.value);
                    if(event.type === 'days'){
                        progress = ((days - event.value) * 100) / (days);
                    }else{                    
                        progress = (100 / divider[event.type]) * (divider[event.type] - event.value);
                    }
                    break;
                case "finished":
                    $this.hide();
                    break;
            }
        });
    });

    jQuery('.check-value').on('focusout', function () {
        var text_val = jQuery(this).val();
        if (text_val === "" || text_val.replace(/^\s+|\s+$/g, '') === "") {
            jQuery(this).removeClass('has-value');
        } else {
            jQuery(this).addClass('has-value');
        }
    });


    jQuery('.check-value').each(function(){
        var text_val = jQuery(this).val();

        if (text_val === "" || text_val.replace(/^\s+|\s+$/g, '') === "") {
            jQuery(this).removeClass('has-value');
        } else {
            jQuery(this).addClass('has-value');
        }
    });

});