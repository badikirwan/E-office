
	var baseurl = 'http://localhost/eoffice/';
	function show_password() {
		var pass = document.getElementById("InputPass");
		if (pass.type == "password") {
			pass.type = "text";
		} else {
			pass.type = "password";
		}
	}

	$(function() {
		$( "#tgl_start" ).datepicker({
			changeMonth: true,
			changeYear: true,
			dateFormat: 'yy-mm-dd'
		});
		$( "#tgl_end" ).datepicker({
			changeMonth: true,
			changeYear: true,
			dateFormat: 'yy-mm-dd'
		});
	});

	$(function () {
			$( "#kode_klas" ).autocomplete({
				source: function(request, response) {
					$.ajax({
						url: baseurl +'surat_masuk/get_klasifikasi',
						data: { kode: $("#kode_klas").val()},
						dataType: "json",
						type: "POST",
						success: function(data){
							response(data);
						}
					});
				},
			});
		});

	$(function() {
			$(".clickable-row").click(function() {
	        window.document.location = $(this).data("href");
	    });
	});

	$(".delete-dis").click(function() {
			var id = $(this).val();
			if (confirm("Anda yakin ingin menghapus ?")) {
				$.ajax({
					url: baseurl +'disposisi/delete/'+id,
					type: "post",
					success: function() {
						location.reload();
					}
				});
			}
	});

	$(function() {
      $("#tujuan-disposisi").autocomplete({
        source: function(request, response) {
          $.ajax({
            url: baseurl+ '/disposisi/get_tujuan_disposisi',
            data:  { kode: $("#tujuan-disposisi").val()},
            dataType: "json",
            type: "POST",
            success: function(data) {
              response(data);
            }
          });
        }, select: function(event, ui) {
          event.preventDefault();
          $("#tujuan-disposisi").val(ui.item.label);
          $("#id_user").val(ui.item.value);
        }
      });
    });
