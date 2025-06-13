jQuery(document).ready(function ($) {
    // Attach click event to the dismiss button
    $(document).on('click', '.notice[data-notice="get-start"] button.notice-dismiss', function () {
        // Dismiss the notice via AJAX
        $.ajax({
            type: 'POST',
            url: ajaxurl,
            data: {
                action: 'marketing_firm_dismissed_notice',
            },
            success: function () {
                // Remove the notice on success
                $('.notice[data-notice="example"]').remove();
            }
        });
    });
});

// WordClever – AI Content Writer plugin activation
document.addEventListener('DOMContentLoaded', function () {
    const marketing_firm_button = document.getElementById('install-activate-button');

    if (!marketing_firm_button) return;

    marketing_firm_button.addEventListener('click', function (e) {
        e.preventDefault();

        const marketing_firm_redirectUrl = marketing_firm_button.getAttribute('data-redirect');

        // Step 1: Check if plugin is already active
        const marketing_firm_checkData = new FormData();
        marketing_firm_checkData.append('action', 'check_wordclever_activation');

        fetch(installWordcleverData.ajaxurl, {
            method: 'POST',
            body: marketing_firm_checkData,
        })
        .then(res => res.json())
        .then(res => {
            if (res.success && res.data.active) {
                // Plugin is already active → just redirect
                window.location.href = marketing_firm_redirectUrl;
            } else {
                // Not active → proceed with install + activate
                marketing_firm_button.textContent = 'Installing & Activating...';

                const marketing_firm_installData = new FormData();
                marketing_firm_installData.append('action', 'install_and_activate_wordclever_plugin');
                marketing_firm_installData.append('_ajax_nonce', installWordcleverData.nonce);

                fetch(installWordcleverData.ajaxurl, {
                    method: 'POST',
                    body: marketing_firm_installData,
                })
                .then(res => res.json())
                .then(res => {
                    if (res.success) {
                        window.location.href = marketing_firm_redirectUrl;
                    } else {
                        alert('Activation error: ' + (res.data?.message || 'Unknown error'));
                        marketing_firm_button.textContent = 'Try Again';
                    }
                })
                .catch(error => {
                    alert('Request failed: ' + error.message);
                    marketing_firm_button.textContent = 'Try Again';
                });
            }
        })
        .catch(error => {
            alert('Check request failed: ' + error.message);
        });
    });
});
