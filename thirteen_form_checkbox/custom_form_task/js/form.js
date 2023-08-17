(function ($, Drupal) {
    $(document).ready(function () {
        var $noLastName = $('#no-last-name');
        var $lastName = $('.form-item-last-name');
        if ($noLastName.is(':checked')) {
            $lastName.hide();
        }

        $noLastName.on('change', function () {
        if ($(this).is(':checked')) {
            $lastName.hide();
        } else {
            $lastName.show();
        }
        });
    });
}(jQuery, Drupal));
