(function ($, undefined) {
	window.Wds = window.Wds || {};

	function switch_reporting(on) {
		var $checkbox = $(":checkbox[name*='checkup-cron-enable']"),
			$tab = $('[data-target="tab_settings"]').get(0),
			$enable_button = $('.wds-enable-reporting'),
			$disable_button = $('.wds-disable-reporting');

		$tab.click();
		$checkbox.attr('checked', on);
		$checkbox.trigger('change');
		if (on) {
			$enable_button.hide();
			$disable_button.show();
		}
		else {
			$enable_button.show();
			$disable_button.hide();
		}
	}

	function toggle_stats_button() {
		var $checkbox = $(this),
			$enable_button = $('.wds-enable-reporting'),
			$disable_button = $('.wds-disable-reporting');

		if ($checkbox.is(':checked')) {
			$enable_button.hide();
			$disable_button.show();
		}
		else {
			$enable_button.show();
			$disable_button.hide();
		}
	}

	function enable_reporting(e) {
		e.preventDefault();

		switch_reporting(true);
	}

	function disable_reporting(e) {
		e.preventDefault();

		switch_reporting(false);
	}

	function open_target_check_item() {
		var query = new URLSearchParams(window.location.search),
			check_id = query.get('check');
		if (!check_id) {
			return;
		}

		var $check_item = $('#' + check_id);
		if ($check_item.length && $check_item.is('.wds-check-item')) {
			var $admin_bar = $('#wpadminbar'),
				scroll_top = $admin_bar.length
					? $check_item.offset().top - $admin_bar.height()
					: $check_item.offset().top;

			$check_item.addClass('sui-accordion-item--open');
			$([document.documentElement, document.body]).animate({
				scrollTop: scroll_top
			}, 500);
		}
	}

	function show_progress_dialog() {
		var dialog = (SUI.dialogs || {})['wds-checkup-progress-modal'];

		if (dialog) {
			dialog.show();

			Wds.update_checkup_progress(
				$('.wds-progress', $('#wds-checkup-progress-modal')),
				function () {
					window.location.reload();
				}
			);
		}
	}

	function submit_dialog_form_on_enter(e) {
		var $button = $(this).find('.wds-add-email-recipient'),
			key = e.which;

		if ($button.length && 13 === key) {
			e.preventDefault();
			e.stopPropagation();

			$button.click();
		}
	}

	function frequency_tab_change(event, tab) {
		var frequency = $(tab).data('frequency');
		$('#wds-checkup-frequency').val(frequency).trigger('change');
		$dow_selects = $('.wds-dow').hide();
		$dow_selects.find('select').prop('disabled', true);
		$dow_selects.filter('.' + frequency).show();
		$dow_selects.filter('.' + frequency).find('select').prop('disabled', false);
	}

	function init() {
		window.Wds.hook_toggleables();
		window.Wds.vertical_tabs();
		window.Wds.upsell();
		window.Wds.side_tabs();
		open_target_check_item();

		$(document)
			.on('click', '.wds-enable-reporting', enable_reporting)
			.on('click', '.wds-disable-reporting', disable_reporting)
			.on('wds_side_tabs:tab_change', '.sui-side-tabs', frequency_tab_change);

		$(":checkbox[name*='checkup-cron-enable']").on('change', toggle_stats_button);

		$(document).on('keydown', '.sui-dialog', submit_dialog_form_on_enter);
	}

	$(window).on('load', function () {
		show_progress_dialog();
	});

	$(init);
})(jQuery);
