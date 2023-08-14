/*- about__btn -*/
$(".about__btn").on('click', function(event) {
    if (this.hash !== "") {
        event.preventDefault();
        var hash = this.hash;
        $('html, body').animate({
            scrollTop: $(hash).offset().top
        }, 800, function(){
            window.location.hash = hash;
        });
    }
});

/*- field -*/
$('.field-input input, .field-textarea textarea').on('focusin', function() {
    $(this).parent().find('label').addClass('active');
});
 
$('.field-input input, .field-textarea textarea').on('focusout', function() {
    if (!this.value) {
        $(this).parent().find('label').removeClass('active');
    }
});

/*- phone -*/
$("body").on("focusin", "input[type=tel]", function() {
        $(this).inputmask({
            mask: ["+9999999999999", "+9999999999999"],
            greedy: !1
        })
    });
function t() {
    var e = $.Deferred(),
        o = new Image;
    return o.onload = function () {
        e.resolve()
    }, o.onerror = function () {
        e.reject()
    }, o.src = "https://www.gstatic.com/webp/gallery/1.webp", e.promise()
}

/*- modal -*/
const myModal = new HystModal({
    closeOnEsc: true,
    backscroll: true,
    afterClose: function(modal){
        let videoframe = modal.openedWindow.querySelector('iframe');
        if(videoframe){
            videoframe.contentWindow.postMessage('{"event":"command","func":"stopVideo","args":""}', '*');
        }
    },        
});