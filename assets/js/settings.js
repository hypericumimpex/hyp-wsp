if (document.getElementById('wpnotif_loading_anim')) {
    lottie.loadAnimation({
        container: document.getElementById('wpnotif_loading_anim'),
        renderer: 'html',
        loop: true,
        autoplay: true,
        path: wpnotifobj.anim
    });
}
jQuery(function () {
    "use strict";

    jQuery(".wpnotif_multiselect_enable").select2();

    jQuery(".wpnotif_multiselect_dynamic_enable").select2({
        tags: true,
        tokenSeparators: [',', ' ']
    });
    var gatewayInp = jQuery(".wpnotif_gateways");

    var gatewayBoxTemplate = jQuery("#gateway_template").html();
    var apisettingsTab = jQuery(".wpnotif_gateway_settings");
    var gateway_table_list = jQuery(".gateway_table");


    var allowUpdate = false;
    var gatewayList = jQuery.parseJSON(gatewayInp.val());

    jQuery(document).on("change", ".wpnotif_gateway_box input,.wpnotif-gs-trigger select", function () {
        var thisGatewayBox = jQuery(this).closest('.wpnotif_gateway_box');
        var gatewaySelect = thisGatewayBox.find('.wpnotif_gateway');
        var gateway = gatewaySelect.val();
        var countriesBox = thisGatewayBox.find('.gateway_countries select');

        var countries;
        if (!gateway || gateway == undefined) return;

        var values = {};
        values['ccodes'] = 0;
        values['countries'] = '';
        if (thisGatewayBox.attr('all')) {
            values['countries'] = 'all';
            values['all'] = 1;
            values['ccodes'] = 0;
        } else {
            values['all'] = 0;
            if (countriesBox.val() != null) {
                var countriesBoxValue = countriesBox.val();
                values['ccodes'] = countriesBoxValue.join();
                var countryList = [];
                countriesBox.find("option:selected").each(function () {
                    countryList.push(jQuery(this).attr('data-country'));
                });
                var countryListString = countryList.join();
                values['countries'] = countryListString;
                thisGatewayBox.find('.wpnotif_ctr_list').text(countryListString);
            }
        }

        var prevGateway;
        if (jQuery(this).hasClass('wpnotif_gateway') && thisGatewayBox.attr('wpnotif-gateway')) {
            prevGateway = thisGatewayBox.attr('wpnotif-gateway');
            enableGateway(prevGateway);
        } else {
            prevGateway = gateway;
        }
        values['gateway'] = gateway;
        if (thisGatewayBox.find('.input-switch input').prop("checked") == true) {
            values['enable'] = 'on';
        } else {
            values['enable'] = 'off';
        }

        thisGatewayBox.attr('enable', values['enable']);

        if (gateway == 1001) {
            values['data-label'] = 'Whatsapp';
            values['class'] = 'hideGatewayList';

        }


        disableGateway(gatewaySelect, gateway);


        var dataString;
        if (gatewayList.hasOwnProperty('gc_' + prevGateway)) {
            gatewayList['gc_' + prevGateway] = values;
            dataString = JSON.stringify(gatewayList);
            dataString = dataString.replace('"gc_' + prevGateway + '":{', '"gc_' + gateway + '":{');
            gatewayList = JSON.parse(dataString);

        } else {
            gatewayList['gc_' + gateway] = values;
            dataString = JSON.stringify(gatewayList);
        }


        gatewayInp.val(dataString);


        var $this = jQuery(this);
        setTimeout(function () {
            if ($this.hasClass('wpnotif_gateway')) {
                updateDigGatewayFields($this);
            }
        });


        if (allowUpdate) {
            allowUpdateSettings();
        }
    });

    var otpSettings = jQuery(".disotp");

    function updateDigGatewayFields($this) {


        var selected = $this.find("option:selected");
        var han = selected.attr('han');

        var gatewayName = selected.text();
        var val = $this.val();
        var thisGatewayBox = $this.closest('.wpnotif_gateway_box');
        var table = thisGatewayBox.find('.selected_gateway_conf');
        table.find('.gateway_conf').appendTo(gateway_table_list);
        gateway_table_list.find('.' + han + 'cred').show().appendTo(table);


        if (!thisGatewayBox.attr('all')) thisGatewayBox.find('.wpnotif_gateway_target_head').text(gatewayName);
        else if (thisGatewayBox.attr('data-label'))
            thisGatewayBox.find('.wpnotif_gateway_target_head').text(thisGatewayBox.attr('data-label'));

        if (thisGatewayBox.attr('enable') != 'on') {
            thisGatewayBox.find('.input-switch input').prop('checked', false).trigger('change');
        } else {
            thisGatewayBox.find('.input-switch input').prop('checked', true).trigger('change');
        }

        thisGatewayBox.attr('wpnotif-gateway', val);


        var size = Object.keys(gatewayList).length;
        if (
            (size == 1 && (gatewayList.hasOwnProperty('gc_1') || gatewayList.hasOwnProperty('gc_13'))) ||
            (size == 2 && gatewayList.hasOwnProperty('gc_1') && gatewayList.hasOwnProperty('gc_13'))) {
            otpSettings.hide();
        } else {
            otpSettings.show();
        }
    };
//thisGatewayBox.find(".disotp").hide();
    jQuery.each(gatewayList, function (gatewayCode, values) {

        allowUpdate = false;
        addUpdateGatewayBox(values['gateway'], values);
        allowUpdate = true;

    });

    jQuery(".apisettingstab .wpnotif_gateway_settings").find(".hideGatewayList").after('<div class="country_specific"><div class="wpnotif_ad_head"><span>Country Specific</span></div></div>');

    jQuery(".add_gateway_group_button").on('click', function () {
        allowUpdate = true;
        addUpdateGatewayBox(-1, null);
    })

    function addUpdateGatewayBox(gatewayCode, values) {
        var gatewayBox = jQuery(gatewayBoxTemplate).clone();
        apisettingsTab.append(gatewayBox);


        var gatewaySelectbox = gatewayBox.find('.wpnotif_gateway');
        var gatewayCountries = gatewayBox.find('.gateway_countries select');

        var expand = false;
        if (values != null) {

            if (values['all'] == 1) {
                gatewayBox.attr('all', '1').addClass("wpnotif_gate_allcountries active");
                expandGateway(gatewayBox, false, false);


                if (values['data-label'])
                    gatewayBox.attr('data-label', values['data-label']);

                if (values['class'])
                    gatewayBox.addClass(values['class']);


            } else {
                gatewayBox.removeAttr('all');
                var countriesString = values['countries'];
                gatewayBox.find('.wpnotif_ctr_list').text(countriesString);

                gatewayBox.find('.wpnotif_gateway_configuation_expand_box').hide();

                var countriesArray = countriesString.split(',');
                jQuery.each(countriesArray, function (key, country) {
                    gatewayCountries.find('[data-country="' + country + '"]').attr('selected', 'selected');
                })


            }

            gatewaySelectbox.val(gatewayCode);
        } else {
            collapseGateway();


            expandGateway(gatewayBox, true, true);

            jQuery.each(gatewayList, function (gc, values) {
                var gatewayCode = values['gateway'];
                gatewaySelectbox.find('[data-value=' + gatewayCode + ']').addClass('disabled').attr('disabled', 'disabled');
            });
            var selNotDisabled = gatewaySelectbox.find('option:not([disabled]):first').val();
            gatewaySelectbox.val(selNotDisabled);


        }

        var input_switch = gatewayBox.find('.input-switch');
        var random = Math.random();
        input_switch.find('input').attr('id', random);
        input_switch.find('label').attr('for', random);


        if (values == null || values['enable'] != 'on') {
            input_switch.find('input').prop('checked', false).trigger('change');
        } else {
            input_switch.find('input').prop('checked', true).trigger('change');
        }
        //gatewayBox.attr('enable',values['enable']);


        gatewaySelectbox.niceSelect().trigger('change');
        gatewayCountries.select2();


    }

    jQuery(document).on("click", ".wpnotif_gateway_box_close,.wpnotif_gateway_settings .inactive,.wpnotif_gateway_settings .wpnotif_gateay_conf_expand", function (e) {
        if (jQuery(e.target).hasClass('wpnotif_gateay_conf_delete')) return;


        var showGatewayBox = jQuery(this).closest('.wpnotif_gateway_box');
        if (!showGatewayBox.hasClass('active')) {
            collapseGateway();

            showGatewayBox.addClass('active');
            expandGateway(showGatewayBox, false, true);
        } else {
            collapseGateway();
        }


    });


    jQuery(".whatsapp_whatsapp_gateway").on('change', function () {
        var value = jQuery(this).val();
        var name = jQuery(this).attr('name');
        jQuery('.' + name + '_active').hide();
        jQuery('.whatsapp_gateway_' + value).addClass(name + '_active').show();
    });
    setTimeout(function () {
        jQuery(".wpnotif-hide-elem").hide();
        jQuery(".whatsapp_whatsapp_gateway").trigger('change');
    })

    function enableGateway(gateway) {
        jQuery(".wpnotif-gs-gatway-select-td").find('[data-value=' + gateway + ']').removeClass('disabled').removeAttr('disabled');
    }

    function disableGateway(gatewaySelect, gateway) {
        jQuery(".wpnotif-gs-gatway-select-td").find('[data-value=' + gateway + ']').addClass('disabled').attr('disabled', 'disabled');
        gatewaySelect.find('[data-value=' + gateway + ']').removeClass('disabled').removeAttr('disabled');
    }

    jQuery(document).on("click", ".wpnotif_gateay_conf_delete", function (e) {

        var thisGatewayBox = jQuery(this).closest('.wpnotif_gateway_box');
        var gc = thisGatewayBox.attr('wpnotif-gateway');
        if (thisGatewayBox.attr('all')) {
            jQuery(this).remove();
            return;
        }

        enableGateway(gc);
        delete gatewayList['gc_' + gc];
        gatewayInp.val(JSON.stringify(gatewayList));


        var table = thisGatewayBox.find('.selected_gateway_conf');
        table.find('.gateway_conf').appendTo(gateway_table_list);

        thisGatewayBox.slideUp('fast').remove();

        allowUpdateSettings();
    });


    function collapseGateway() {
        jQuery(".active").removeClass('active').find(".wpnotif_gateway_configuation_expand_box").slideUp('fast');


    }

    var activeGb;

    function expandGateway(gatewayBox, isNew, autoScroll) {

        activeGb = gatewayBox;
        gatewayBox.addClass('active').find(".wpnotif_gateway_configuation_expand_box").stop().slideDown('fast', function () {
            if (!autoScroll) return;
            if (!isNew) {
                gatewayScroll();
            } else {
                setTimeout(function () {
                    gatewayScroll();
                }, 190)
            }
        });


    }

    function gatewayScroll() {
        jQuery('html, body').stop().animate({
            scrollTop: activeGb.offset().top - 100
        }, 300);
    }

    function allowUpdateSettings() {
        jQuery(".wpnotif_ad_submit").removeAttr("disabled");

    }


    jQuery(".wpnotif_admim_conf").find("select").niceSelect();


    var wpnotif_sort_fields = jQuery(".wpnotif-reg-fields").find('tbody');

    if (wpnotif_sort_fields.length) {
        var wpnotif_sortorder = jQuery("#wpnotif_sortorder");


        var sortorder = wpnotif_sortorder.val().split(',');

        wpnotif_sort_fields.find('tr').sort(function (a, b) {
            var ap = jQuery.inArray(a.id, sortorder);
            var bp = jQuery.inArray(b.id, sortorder);
            return (ap < bp) ? -1 : (ap > bp) ? 1 : 0;


        }).appendTo(wpnotif_sort_fields);


        wpnotif_sort_fields.sortable({
            update: function (event, ui) {
                var sortOrder = jQuery(this).sortable('toArray').toString();
                wpnotif_sortorder.val(sortOrder);

                allowUpdateSettings();
            }
        });

    }

    var dpc = jQuery('#wpnotif_purchasecode');

    function showDigMessage(message) {

        if (jQuery(".wpnotif_popmessage").length) {
            jQuery(".wpnotif_popmessage").find(".wpnotif_lase_message").text(message);
        } else {
            jQuery("body").append("<div class='wpnotif_popmessage'><div class='wpnotif_firele'><img src='" + wpnotifobj.face + "'></div><div class='wpnotif_lasele'><div class='wpnotif_lase_snap'>" + wpnotifobj.ohsnap + "</div><div class='wpnotif_lase_message'>" + message + "</div></div><img class='wpnotif_popdismiss' src='" + wpnotifobj.cross + "'></div>");
            jQuery(".wpnotif_popmessage").slideDown('fast');
        }

    }

    function hideDigMessage() {
        jQuery(".wpnotif_popmessage").remove();
    }


    var wpnotif_tab_wrapper = jQuery(".wpnotif-tab-wrapper");
    if (wpnotif_tab_wrapper.length) {
        var wpnotif_ad_submit = jQuery(".wpnotif_ad_submit");
        var width_wpnotif_ad_submit = wpnotif_ad_submit.outerWidth(true) + 24;
        var wpnotif_left_side = jQuery(".wpnotif_ad_left_side");
        jQuery(window).load(function () {
            update_tab_width();
        });
        jQuery(window).resize(function () {
            update_tab_width();
            update_tab_sticky();
            update_tb_line();

        });

        var respon_win = 822;
        var tb_top = wpnotif_tab_wrapper.offset().top;
        var ad_bar_height = jQuery("#wpadminbar").outerHeight(true);
        jQuery(window).scroll(function () {
            update_tab_sticky();
        });


        jQuery(window).trigger('scroll');

    }

    function update_tab_sticky() {
        var w_top = jQuery(window).scrollTop();
        var sb = tb_top - w_top;
        if (sb <= ad_bar_height && jQuery(window).width() >= respon_win) {
            wpnotif_tab_wrapper.addClass("wpnotif-tab-wrapper-fixed").css({'top': ad_bar_height});
        } else {
            wpnotif_tab_wrapper.removeClass("wpnotif-tab-wrapper-fixed");
        }
    }

    function update_tab_width() {
        var w = wpnotif_left_side.width();
        wpnotif_tab_wrapper.outerWidth(w);
        wpnotif_ad_submit.css({'left': wpnotif_left_side.offset().left + w - 168});

    }

    var $mainNav = jQuery(".wpnotif-tab-ul");

    jQuery(document).on("click", ".wpnotif_popmessage", function () {

        jQuery(this).closest('.wpnotif_popmessage').slideUp('fast', function () {
            jQuery(this).remove();
        });
    })

    var $el, leftPos, newWidth;

    $mainNav.append("<li id='wpnotif-tab-magic-line'></li>");
    var $magicLine = jQuery("#wpnotif-tab-magic-line");

    update_tb_line();

    function update_tb_line() {
        var wpnotif_active_tab = jQuery(".wpnotif-nav-tab-active");

        if (!wpnotif_active_tab.length) return;

        var wpnotif_active_tab_par_pos = wpnotif_active_tab.parent().position();
        $magicLine
            .width(wpnotif_active_tab.parent().width())
            .css({
                "left": wpnotif_active_tab_par_pos.left,
                "top": wpnotif_active_tab_par_pos.top + 21
            })
            .data("origLeft", $magicLine.position().left)
            .data("origWidth", $magicLine.width());
        if (wpnotif_active_tab.hasClass("wpnotif_ngmc") && !wpnotif_active_tab.hasClass("customfieldsNavTab")) {

            $magicLine.hide().css({'top': 45});
        }
    }

    jQuery(".updatetabview").on('click', function () {


        var c = jQuery(this).attr('tab');

        var acr = jQuery(this).attr('acr');

        var refresh = jQuery(this).attr('refresh');

        if (typeof refresh !== typeof undefined && refresh !== false) {
            location.reload();
            return true;
        }

        if (typeof acr !== typeof undefined && acr !== false) {
            var inv = dpc.attr('invalid');
            if (dpc.val().length != 36 || inv == 1) {

                showDigMessage(wpnotifobj.plsActMessage);
                if (jQuery("#wpnotif_activatetab").length) {
                    jQuery("#wpnotif_activatetab").click();
                    dpc.focus();
                }
                return false;
            }
        }

        if (!jQuery(this).hasClass("wpnotif_ngmc")) {
            $magicLine.show();
            $el = jQuery(this).parent();
            leftPos = $el.position().left;
            newWidth = $el.width();
            $magicLine.stop().animate({
                left: leftPos,
                width: newWidth,
                top: $el.position().top + 21
            }, 'fast');
        } else {
            $magicLine.hide();
        }


        jQuery(".digcurrentactive").removeClass("digcurrentactive").hide();

        var tab = jQuery("." + c);
        tab.fadeIn(150).addClass("digcurrentactive");


        if (jQuery(".wpnotif-tab-wrapper-fixed").length)
            jQuery('html, body').animate({scrollTop: tab.offset().top - 90}, 220);


        jQuery(".wpnotif-nav-tab-active").removeClass("wpnotif-nav-tab-active");
        jQuery(this).addClass("wpnotif-nav-tab-active");


        updateURL("tab", c.slice(0, -3));

        return false;
    });

    function updateURL(key, val) {
        var url = window.location.href;
        var reExp = new RegExp("[\?|\&]" + key + "=[0-9a-zA-Z\_\+\-\|\.\,\;]*");

        if (reExp.test(url)) {
            // update
            var reExp = new RegExp("[\?&]" + key + "=([^&#]*)");
            var delimiter = reExp.exec(url)[0].charAt(0);
            url = url.replace(reExp, delimiter + key + "=" + val);
        } else {
            // add
            var newParam = key + "=" + val;
            if (!url.indexOf('?')) {
                url += '?';
            }

            if (url.indexOf('#') > -1) {
                var urlparts = url.split('#');
                url = urlparts[0] + "&" + newParam + (urlparts[1] ? "#" + urlparts[1] : '');
            } else {
                url += "&" + newParam;
            }
        }
        window.history.pushState(null, document.title, url);
    }


    var chn = false;
    jQuery(".wpnotif_admim_conf textarea,.wpnotif_admim_conf input").on('keyup', function () {
        if (!jQuery(this).attr("readonly") && !jQuery(this).attr('wpnotif-save')) {
            var pcheck = jQuery(this).closest('.digcon');
            if (!pcheck.length) enableSave();
        }

    });
    jQuery(".wpnotif_admim_conf input,.wpnotif_admim_conf select,.wpnotif_activation_form input").on('change', function () {

        if (!jQuery(this).attr("readonly") && !jQuery(this).attr('wpnotif-save')) enableSave();
    });


    var wpnotif_pc = jQuery("#wpnotif_purchasecode");

    wpnotif_pc.on('change', function () {
        if (jQuery(this).attr('readonly')) return;
        jQuery(".customfieldsNavTab").attr('refresh', 1);
    });
    wpnotif_pc.on('keyup', function () {

        if (jQuery(this).attr('readonly')) return;


        if (jQuery(this).val().length == 36 || jQuery(this).val().length == 0) {
            jQuery(".wpnotif_prc_ver").hide();
            jQuery(".wpnotif_prc_nover").hide();
        } else {
            invPC(-1);
        }
    });

    function enableSave() {
        if (!chn) {
            chn = true;
            allowUpdateSettings();
        }
    }

    function allowUpdateSettings() {
        jQuery(".wpnotif_ad_submit").removeAttr("disabled");

    }


    jQuery(".wpnotif_copy_shortcode").on('click', function () {
        var a = jQuery(this).parent();
        var i = a.find("input");
        copyShortcode(i);
    });

    function copyShortcode(i) {
        if (i.attr("nocop")) return;
        i.select();
        document.execCommand("copy");
        var v = i.val();
        i.val(wpnotifobj.Copiedtoclipboard);
        setTimeout(
            function () {
                i.val(v);
            }, 800);
    }

    dpc.mask('AAAAAAAA-AAAA-AAAA-AAAA-AAAAAAAAAAAA');

    var wpnotif_tapp = jQuery("#wpnotif_tapp");

    var sgs = jQuery(".wpnotif_load_overlay_gs");

    var se = sgs.length;


    var wpnotif_test_api_status = 0;

    jQuery(".wpnotif_request_server_addition").on('click', function () {
        var hr = jQuery(this).attr('href');
        window.open(hr, '_target');
    })
    var refreshCode = 0;
    jQuery(".wpnotif_domain_type").find('button').on('click', function () {
        var value = jQuery(this).attr('val');
        jQuery("input[name='wpnotif_license_type']").val(value);
        if (refreshCode != 1) {
            refreshCode = 0;
            jQuery("#wpnotif_purchasecode").val('').removeAttr('readonly');
        }
        jQuery(".wpnotif_prchcde").fadeIn('fast');
        jQuery(".wpnotif_domain_type").hide();
        jQuery(".wpnotif_btn_unregister").hide();

        if (value != 1) {
            jQuery(".request_live_server_addition").show();
            jQuery(".request_testing_server_addition").hide();
        } else {
            jQuery(".request_live_server_addition").hide();
            jQuery(".request_testing_server_addition").show();
        }
    })
    jQuery(".wpnotif_btn_unregister").on('click', function () {

        sgs.find('.circle-loader').removeClass('load-complete');
        sgs.find('.checkmark').hide();
        sgs.fadeIn();


        var code = dpc.val();
        jQuery.post('https://bridge.unitedover.com/updates/verify.php',
            {
                code: code,
                slug: 'wpnotif',
                request_site: encodeURIComponent(jQuery("input[name='wpnotif_domain']").val()),
                license_type: jQuery("input[name='wpnotif_license_type']").val(),
                unregister: 1,
                version: jQuery("input[name='wpnotif_version']").val(),
                settings: 1,
            }, function (data, status) {
                if (data == 1) {
                    jQuery(".wpnotif_domain_type").fadeIn('fast');
                    jQuery(".wpnotif_prchcde").fadeOut();
                    jQuery(".wpnotif_prc_ver").fadeOut();
                    jQuery(".wpnotif_prc_nover").hide();
                    jQuery("#wpnotif_purchasecode").val('').removeAttr('readonly').trigger('change');
                } else {
                    showDigMessage(data);
                }
                jQuery(".wpnotif_activation_form").submit();

                return false;
            }
        );

    })

    jQuery(".wpnotif_btn_unregister").on('click', function () {

        sgs.find('.circle-loader').removeClass('load-complete');
        sgs.find('.checkmark').hide();
        sgs.fadeIn();


        var code = dpc.val();
        jQuery.post('https://bridge.unitedover.com/updates/verify.php',
            {
                code: code,
                slug: 'wpnotif',
                request_site: encodeURIComponent(jQuery("input[name='wpnotif_domain']").val()),
                license_type: jQuery("input[name='wpnotif_license_type']").val(),
                addons: jQuery("input[name='wpnotif_addons_list']").val(),
                unregister: 1,
                version: jQuery("input[name='wpnotif_version']").val(),
                settings: 1,
            }, function (data, status) {
                jQuery(".wpnotif_btn_unregister").hide();

                jQuery("#wpnotif_purchasecode").val('').removeAttr('readonly').trigger('change');
                jQuery(".wpnotif_activation_form").submit();

                return false;
            }
        );

    })


    var dac;
    jQuery('.wpnotif_ad_submit').on('click', function () {
        jQuery("#wpnotif_setting_update").submit();
    })
    var refreshCode = 0;
    jQuery("#wpnotif_setting_update").on("submit", function () {
        dac = jQuery(this);


        hideDigMessage();

        var isOpt = false;
        var fd = dac.serialize();

        if (wpnotif_test_api_status != 1) {
            sgs.find('.circle-loader').removeClass('load-complete');
            sgs.find('.checkmark').hide();
            sgs.fadeIn();
        }

        var code = dpc.val();
        if (code.length == 0) {

            jQuery(".wpnotif_prc_ver").hide();
            jQuery(".wpnotif_prc_nover").hide();

            updateSettings(fd, -1);
            return false;
        } else if (code.length != 36) {
            showDigMessage(wpnotifobj.invalidpurchasecode);

            jQuery(".wpnotif_prc_ver").hide();
            jQuery(".wpnotif_prc_nover").show();
            updateSettings(fd, -1);
            return false;
        }


        jQuery.post('https://bridge.unitedover.com/updates/verify.php',
            {
                json: 1,
                code: code,
                slug: 'wpnotif',
                request_site: encodeURIComponent(jQuery("input[name='wpnotif_domain']").val()),
                settings: 1,
                license_type: jQuery("input[name='wpnotif_license_type']").val(),
                version: jQuery("input[name='wpnotif_version']").val(),
            }, function (response, status) {

                var data = response.code;


                var type = response.type;
                refreshCode = 1;
                jQuery(".wpnotif_domain_type").find('button[val=' + type + ']').trigger('click');
                fd = dac.serialize();

                if (data != 1) {
                    invPC(se);
                    dpc.attr('invalid', 1);


                } else {
                    jQuery(".wpnotif_prc_ver").show();
                    jQuery(".wpnotif_prc_nover").hide();
                    dpc.attr('invalid', 0);

                }

                if (data == 0) {
                    showDigMessage(wpnotifobj.invalidpurchasecode);
                    if (!sgs.attr("ajxsu")) {
                        updateSettings(fd, -1);
                    }

                } else if (data == 1) {

                    jQuery(".wpnotif_btn_unregister").show();

                    if (sgs.attr("ajxsu")) {
                        jQuery(".wpnotif_activation_form").unbind("submit").submit();
                    } else {
                        updateSettings(fd, 1);
                        jQuery(".wpnotif_pc_notice").hide();
                    }
                } else {
                    if (data == -1) {
                        showDigMessage("This purchase code is already being used on another site.");
                    } else showDigMessage(response.msg);


                    if (!sgs.attr("ajxsu")) {
                        updateSettings(fd, -1);
                    }
                }


            }
        );


        return false;
    });


    function invPC(se) {
        jQuery("#wpnotif_purchasecode").removeAttr('readonly');
        jQuery(".wpnotif_prc_ver").hide();
        jQuery(".wpnotif_prc_nover").show();
        if (se > 0) sgs.hide();
    }

    function updateSettings(fd, activate) {


        jQuery.ajax({
            type: "POST",
            url: wpnotifobj.ajax_url,
            data: fd + '&action=wpnotif_save_settings&pca=' + activate,
            success: function (data) {

                sgs.find('.circle-loader').addClass('load-complete');
                sgs.find('.checkmark').show();
                setTimeout(
                    function () {
                        sgs.fadeOut();
                        chn = false;
                        jQuery(".wpnotif_ad_submit").attr("disabled", "disabled");
                        if (wpnotif_test_api_status == 1) {
                            digCallTestApi();
                        }
                    }, 1500);


            },
            error: function () {
                invPC();
                showDigMessage(wpnotifobj.Error);
            }
        });

    }


    var wpnotif_api_test;

    var loader = jQuery(".wpnotif_load_overlay");

    jQuery(document).on("click", ".wpnotif_call_test_api_btn", function () {


        wpnotif_api_test = jQuery(this).closest(".wpnotif_api_test");

        var wpnotif_test_cont = wpnotif_api_test.find(".digcon");
        var mobile = wpnotif_test_cont.find(".mobile").val();
        var countrycode = wpnotif_test_cont.find(".wpnotif_wc_logincountrycode").val();

        if (mobile.length == 0 || !jQuery.isNumeric(mobile) || countrycode.length == 0 || !jQuery.isNumeric(countrycode)) {
            showDigMessage(wpnotifobj.validnumber);
            return false;
        }

        wpnotif_test_api_status = 1;

        loader.show();

        if (jQuery(".wpnotif_ad_submit").attr("disabled")) {
            digCallTestApi();
        } else jQuery(".wpnotif_activation_form").trigger("submit");


    });

    var sms_processing = false;
    var sms_processing_elem = jQuery(".wpnotif_sms_processing");
    var hide_message_timeout;
    jQuery(".send_quick_sms").on('click', function (e) {

        e.preventDefault();
        if (sms_processing) return;
        clearTimeout(hide_message_timeout);
        var send_button = jQuery(this);
        send_button.addClass('processing').find('span').text(send_button.attr('data-processing')).parent().find('div').addClass('wpnotif_sms_processing');
        sms_processing = true;
        sms_processing_elem.show();
        var box = jQuery(this).closest('.quick_sms_grid');
        var mobile = box.find(".mobile").val();
        wpnotif_test_api_status = 0;
        var response_box = jQuery(".quick_sms_response_box");
        var message = box.find("#quick_message").val();
        var trigger_order_status = 0;
        var order_id = jQuery('.wpnotif_order_id').val();
        if (jQuery(this).hasClass('trigger_order_status')) {
            trigger_order_status = 1;
        }
        var wpnotif_nonce = jQuery(".wpnotif_nonce").val();
        response_box.hide();
        jQuery.ajax({
            type: 'post',
            async: true,
            url: wpnotifobj.ajax_url,
            data: {
                action: 'wpnotif_send_quick_sms',
                mobile: mobile,
                quick_message: message,
                trigger_order_status: trigger_order_status,
                order_id: order_id,
                wpnotif_nonce: wpnotif_nonce,

            },
            success: function (res) {
                box.find("#quick_message").val('');
                send_button.removeClass('processing').find('span').text(send_button.attr('data-send')).parent().find('div').removeClass('wpnotif_sms_processing');
                sms_processing = false;
                sms_processing_elem.hide();

                if (res.success == 0) {
                    response_box.addClass('msg_send_failed').removeClass('msg_send_success');
                } else {
                    response_box.addClass('msg_send_success').removeClass('msg_send_failed');

                    if (res.data.data != null) {
                        try {
                            var data = res.data.data;
                            jQuery.each(data, function (no, msg) {
                                window.open("https://wa.me/" + no + "?text=" + encodeURIComponent(msg));
                            });
                            if (Object.keys(data).length > 1) {
                                update_message(0);
                            }

                        } catch (e) {

                        }
                    }

                }
                response_box.find('.msg').text(res.data.msg).parent().stop().fadeIn('fast');
                hide_message_timeout = setTimeout(function () {
                    response_box.fadeOut('fast')
                }, 3000);
            },
            error: function (res) {
                send_button.removeClass('processing').find('span').text(send_button.attr('data-send')).parent().find('div').removeClass('wpnotif_sms_processing');
                sms_processing = false;
                sms_processing_elem.hide();
                response_box.addClass('msg_send_failed').removeClass('msg_send_success').find('.msg').text(wpnotifobj.Error).parent().stop().fadeIn('fast');

                hide_message_timeout = setTimeout(function () {
                    response_box.fadeOut('fast')
                }, 3000);
            }
        });
        return false;
    })



    function digCallTestApi() {
        if (wpnotif_test_api_status != 1) return;
        loader.show();
        var wpnotif_test_cont = wpnotif_api_test.find(".digcon");
        var mobile = wpnotif_test_cont.find(".mobile").val();
        var countrycode = wpnotif_test_cont.find(".wpnotif_wc_logincountrycode").val();

        var gatewayBox = wpnotif_api_test.closest('.wpnotif_gateway_box');

        var gateway;
        if (gatewayBox.length) {
            gateway = gatewayBox.find(".wpnotif_gateway").val();
        } else {
            gateway = jQuery(".wpnotif_gateway").val();
        }
        wpnotif_test_api_status = 0;
        jQuery.ajax({
            type: 'post',
            async: true,
            url: wpnotifobj.ajax_url,
            data: {
                action: 'wpnotif_test_api',
                digt_mobile: mobile,
                gateway: gateway,
                digt_countrycode: countrycode

            },
            success: function (res) {
                showTestResponse(res);
            },
            error: function (res) {
                showTestResponse(res);
            }
        });
    }


    function showTestResponse(msg) {
        wpnotif_test_api_status = 0;
        wpnotif_api_test.find(".wpnotif_call_test_response").show();
        wpnotif_api_test.find(".wpnotif_call_test_response_msg").text(msg);
        loader.hide();

    }

    wpnotif_tapp.on('change', function () {
        var val = jQuery(this).val();

        var te = wpnotif_tapp.find("option:selected").attr('han');

        te = te.replace(".", "_");

        jQuery('.wpnotif_call_test_response').hide();
        if (val == 1 || val == 13) {

            jQuery(".wpnotif_api_test").hide();
            jQuery(".disotp").hide();
            jQuery(".wpnotif_current_gateway").hide();
        } else {
            jQuery(".wpnotif_api_test").show();
            jQuery(".disotp").show();
            jQuery(".wpnotif_current_gateway").show().find("span").text(wpnotif_tapp.find("option:selected").text());
        }


        wpnotif_tapp.find('option').each(function (index, element) {
            var hanc = jQuery(this).attr("han");
            if (hanc != te) {
                jQuery("." + hanc + "cred").each(function () {
                    jQuery(this).hide().find("input").removeAttr("required");
                });

            }
        });
        jQuery("." + te + "cred").each(function () {
            var input = jQuery(this).show().find("input");
            var optional = input.attr('wpnotif-optional');
            if (optional && optional == 1) return;

            input.attr("required", "required");
        });

    });

    jQuery(document).on("change", ".input-switch input", function () {
        if (jQuery(this).prop("checked") == true) {
            jQuery(this).parent().addClass('checked');
        } else {
            jQuery(this).parent().removeClass('checked');
        }
    });
    var manual_call = false;
    jQuery(document).on("change", ".notification_toggle", function () {
        var table = jQuery(this).closest('table');
        var msg = table.next();
        if (jQuery(this).prop("checked") == true) {
            if (manual_call) {
                msg.show();
            } else {
                msg.stop().slideDown('fast', function () {
                    jQuery(this).show();
                });
            }
        } else {
            if (manual_call) {
                msg.hide();
            } else {
                msg.stop().slideUp('fast');
            }
        }
    });


    var country_based = jQuery("#country_based");
    var gateway_based_notifications = jQuery(".gateway_based_notifications");
    var simple_user_notifications = jQuery(".simple_user_notifications");
    var user_notifications_temp = jQuery(".user_notifications");
    country_based.on('change', function () {
        updateCountryBasedNotifications();
    })
    setTimeout(function () {
        updateCountryBasedNotifications();
    });

    function updateCountryBasedNotifications() {

        if (country_based.prop("checked") == true) {
            var apiSettingsClone = apisettingsTab.clone();
            apiSettingsClone.find('.country_specific').remove();

            apiSettingsClone.find('.wpnotif_gateway_configuation_expand_box_contents').empty().each(function () {
                var clone = user_notifications_temp.clone();

                clone.find('tr').each(function () {
                    var id = "a_" + Math.random();
                    var $this = jQuery(this);
                    $this.find('input, textarea').attr('id', id);
                    $this.find('label').attr('for', id);

                });
                jQuery(this).append('<div class="wpnotif_gateway_sep_line"></div>').append(clone);
            });
            gateway_based_notifications.empty().append(apiSettingsClone);
            gateway_based_notifications.stop().slideDown('fast');
            simple_user_notifications.hide();
        } else {
            gateway_based_notifications.hide();
            simple_user_notifications.show();
        }
    }

    var notifications_json;
    var notifications = jQuery("#wpnotif_gateway_customer_notifications");
    jQuery(document).on("change", ".gateway_based_notifications input,.gateway_based_notifications textarea", function () {
        var json = {};

        gateway_based_notifications.find('.wpnotif_gateway_box').each(function () {
            var gateway = jQuery(this).attr('wpnotif-gateway');
            var values = {};
            jQuery(this).find('.form-switch').each(function () {
                var input = jQuery(this).find('input');
                var key = input.attr('name');
                var checked = '';
                if (input.prop("checked") == true) {
                    checked = 'on';

                }
                var message = jQuery(this).next().find('textarea').val();
                values[key] = {'enable': checked, 'msg': message};

            });
            json['wpnotif_' + gateway] = values;
        });
        notifications.val(JSON.stringify(json));
        enableSave();
    });


    setTimeout(function () {

        try {
            notifications_json = notifications.val();
            notifications_json = notifications_json.replace(/\\/g, "");


            notifications_json = jQuery.parseJSON(notifications_json);
            jQuery.each(notifications_json, function (gateway_key, data) {
                var gateway = gateway_key.replace(/\D/g, '');
                var gatewaybox = gateway_based_notifications.find('div[wpnotif-gateway="' + gateway + '"]');
                if (gatewaybox.length) {
                    jQuery.each(data, function (key, values) {
                        var input = gatewaybox.find('input[name="' + key + '"]');
                        if (values['enable'] == 'on') {
                            input.prop("checked", true).parent().addClass('checked');
                            gatewaybox.find('textarea[name="' + key + '_msg"]').val(values['msg']).closest('.notification_message').show();
                        }
                    });
                }
            })
            notifications.val(JSON.stringify(notifications_json));

        } catch (e) {
        }
    }, 10);

    chn = true;
    manual_call = true;
    wpnotif_tapp.trigger('change');
    jQuery(".input-switch input").trigger('change');

    chn = false;

    jQuery("#wpnotif_loading_container").fadeOut('fast');

    setTimeout(function () {
        manual_call = false;
    })
    jQuery("#wp-admin-bar-wpnotif-pending-messages").on('click', function () {
        jQuery(".wpnotif-box").fadeToggle('fast');
    });
    jQuery(document).on('click', '.wpnotif-whatsapp-send', function (e) {
        e.preventDefault();
        var parent = jQuery(this).closest('.wpnotif-list');
        var mobile = parent.attr('data-mobile');
        var message = parent.find('.wpnotif-message').html();
        var id = parent.attr('data-id');
        window.open("https://wa.me/" + mobile + "?text=" + encodeURIComponent(message));
        parent.fadeOut('fast', function () {
            jQuery(this).remove();
        });

        update_message(id);
        return false;
    });

    function update_message(id) {


        var data_pending = jQuery(".wp-notif-total_messages");

        jQuery.ajax({
            type: 'post',
            async: true,
            url: wpnotifobj.ajax_url,
            data: {
                action: 'wpnotif_update_message',
                id: id,
                wpnotif_nonce: jQuery(".wpnotif_del_nonce").val(),

            },
            success: function (res) {
                res = jQuery.parseHTML(res);
                var notif_box = jQuery(".wpnotif-box");
                notif_box.replaceWith(res);
                var count = jQuery(".wpnotif-box").find(".wpnotif-pending-whatsapp-messages").length;

                jQuery(".wpnotif-box").show();

                data_pending.text(count);

            }
        });
    }

    var notify_user_sms = jQuery("#user_notify_user");
    var notify_user_whatsapp_message = jQuery("#user_whatsapp_message");
    var notify_both = jQuery("#user_combine_both");
    jQuery("#user_notify_user,#user_whatsapp_message").on('change', function () {
        updateUserConsent();
    })
    notify_both.on('change', function () {

        if (notify_both.prop("checked") == true) {
            if (notify_user_sms.prop("checked") == true) notify_user_sms.closest('table').next().slideUp();
            if (notify_user_whatsapp_message.prop("checked") == true) notify_user_whatsapp_message.closest('table').next().slideUp();
        } else {
            if (notify_user_sms.prop("checked") == true) notify_user_sms.closest('table').next().slideDown();
            if (notify_user_whatsapp_message.prop("checked") == true) notify_user_whatsapp_message.closest('table').next().slideDown();
        }
    })
    notify_both.trigger('change');
    updateUserConsent();

    function updateUserConsent() {
        if (notify_user_sms.prop("checked") == true &&
            notify_user_whatsapp_message.prop("checked") == true) {
            notify_both.closest('tr').show();
        } else {
            notify_both.prop("checked", false).trigger('change');
            notify_both.closest('tr').hide();
        }
    }

});