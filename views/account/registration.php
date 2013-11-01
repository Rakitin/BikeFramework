<script type="text/javascript">
	$(document).ready(function() {
		$("#registration_form").ajaxForm({
			iframe: true,
			dataType: "json",
			beforeSubmit: function() {
			},
			success: function(result) {
				$('.error_validate').text('');
				$.each(result.err_validation, function(id, data) {
					$('#error_validate_' + data.element).text(data.message);
				});
				if (!result.err_validation.length) {
					window.location = "<?= URL ?>";
				}
			},
			error: function() {
			}
		});
	});
</script>
<h1>
	Registration
</h1>
<form id='registration_form' action='<?= URL ?>/account/registration_post' method='post'>
    <table border='0' width='100%'>
        <tbody>
			<tr>
                <td align="right">
                    <label for="Name ">Name:</label>
                </td>
                <td>
                    <input type="text" name="Name" value="" size="35">
                </td>
            </tr>
            <tr>
                <td colspan="2" align="center">
                    <span class='error_validate' id='error_validate_Name'></span>
                </td>
            </tr>
            <tr>
                <td align="right">
                    <label for="Email">E-mail:</label>
                </td>
                <td>
                    <input type="email" name="Email" value="" size="35">
                </td>
            </tr>
            <tr>
                <td colspan="2" align="center">
                    <span class='error_validate' id='error_validate_Email'></span>
                </td>
            </tr>
            <tr>
                <td align="right">
                    <label for="Password">Password:</label>
                </td>
                <td>
                    <input type="password" name="Password" value="" size="35">
                </td>
            </tr>
            <tr>
                <td colspan="2" align="center">
                    <span class='error_validate' id='error_validate_Password'></span>
                </td>
            </tr>
            <tr>
                <td align="right">
                    <label for="ConfirmPassword">Confirm password:</label>
                </td>
                <td>
                    <input type="password" name="ConfirmPassword" value="" size="35">
                </td>
            </tr>
            <tr>
                <td colspan="2" align="center">
                    <span class='error_validate' id='error_validate_ConfirmPassword'></span>
                </td>
            </tr>
            <tr>
                <td colspan="2" align="center">
                    <input type="submit" value="Registration"/>
                </td>
            </tr>
        </tbody>
    </table>
</form>