jQuery(document).ready((function(c){c("body").on("change","input.wpzinc-checkbox-toggle",(function(){var e=c("input."+c(this).data("target"));c(this).is(":checked")?c(e).prop("checked",!0):c(e).prop("checked",!1)})),c("body").on("click","a.wpzinc-checkbox-toggle",(function(e){e.preventDefault();var t=c("input."+c(this).data("target"));c(t).first().is(":checked")?c(t).prop("checked",!1):c(t).prop("checked",!0)}))}));