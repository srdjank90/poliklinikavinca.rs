<script src="https://code.jquery.com/jquery-3.7.1.min.js"
    integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
<!-- JS Global Compulsory  -->
<script src="/themes/lika/assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
<!-- JS Implementing Plugins -->
<script src="/themes/lika/assets/vendor/hs-mega-menu/dist/hs-mega-menu.min.js"></script>
<script src="/themes/lika/assets/vendor/hs-show-animation/dist/hs-show-animation.min.js"></script>
<script src="/themes/lika/assets/vendor/hs-go-to/dist/hs-go-to.min.js"></script>
<script src="/themes/lika/assets/vendor/swiper/swiper-bundle.min.js"></script>
<script src="/themes/lika/assets/vendor/countdown/countdown.js"></script>
<script src="/themes/lika/assets/vendor/hs-quantity-counter/dist/hs-quantity-counter.min.js"></script>
<script src="/themes/lika/assets/vendor/tom-select/dist/js/tom-select.complete.min.js"></script>
<!-- JS Front -->
<script src="/themes/lika/assets/js/theme.min.js"></script>
<!-- JS Plugins Init. -->
<script>
    (function() {
        // INITIALIZATION OF MEGA MENU
        new HSMegaMenu(".js-mega-menu", {
            desktop: {
                position: "left",
            },
        });
        new HSShowAnimation(".js-animation-link");
        HSBsValidation.init(".js-validate", {
            onSubmit: (data) => {
                data.event.preventDefault();
                alert("Submited");
            },
        });
        HSBsDropdown.init();
        new HSGoTo(".js-go-to");

        // INITIALIZATION OF SELECT
        // =======================================================
        HSCore.components.HSTomSelect.init('.js-select', {
            render: {
                'option': function(data, escape) {
                    return data.optionTemplate || `<div>${data.text}</div>>`
                },
                'item': function(data, escape) {
                    return data.optionTemplate || `<div>${data.text}</div>>`
                }
            }
        })
    })();
</script>
