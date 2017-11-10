$(document).ready(function () {
    $("abbr.timeago").timeago();
    var profileDisplay = $(".profile-notifications-dropdown"),
        navigationItem = $(".navigation-box"),
        profileDropdown = $(".profile-dropdown"),
        searchForm = $(".profile-search-form");

    //fake click
    $('#cat_1').click();
    
    // replace all form elements
    $(function () {
        jcf.replaceAll();
    });

    $(".close-popup").click(function () {
        $(".popup-wrapp").hide(300);
        $(".popup-overlay-open").hide();
    });

    $(".open-login-popup").click(function () {
        $(".login-popup-wrapp").show(300);
        $(".popup-overlay-open").show();
    });

    $(".close-login-popup").click(function () {
        $(".login-popup-wrapp").hide(300);
        $(".popup-overlay-open").hide();
    });

    $(".open-send-message").click(function (e) {
        e.preventDefault();
        /* Act on the event */
        var that = $(this);
        var c_id = that.data('sender');
        $('#to').val(c_id);
        var c_name = $('#c_name_' + c_id).text();
        var c_img = $('#c_img_' + c_id + ' img').attr('src');
        var c_prof = $('#c_prof_' + c_id).text();
        
        $('#nameOf').text(c_name);
        $('#profesion').text(c_prof);
        $('#send-message .user-image img').attr('src', c_img);
        
        
        $(".popup-overlay-open" ).show();
        $("#send-message").show(300);
    });
    $('.popup-overlay-open').click(function(){
        $('.popup-wrapp').hide(300);
        $(".login-popup-wrapp").hide(300);
        $(".popup-overlay-open").hide();
    });
    //open search form
    $(".profile-search-trigger").click(function () {
        $(".profile-search-form").show(500);

        $hideElements(profileDisplay);
        $hideElements(profileDropdown);
    });
    //search-main
    $('.open-main-search-dropdown').click(function(){
        if($('.main-search-dropdown').css('display') == "none"){
            $('.main-search-dropdown').slideDown(500);   
        }else {
            $('.main-search-dropdown').slideUp(500);
        }
    });
    $(".main-search-dropdown p").click(function(){
        //var pID = this.id;
        $(".open-main-search-dropdown").val(this.id);
        $('.main-search-dropdown').slideUp(500);
         $('.open-main-search-dropdown').click();
    });

    //open profile
    $(".profile-name").click(function () {
        $(".profile-dropdown").slideDown();
        $hideElements(profileDisplay);
        $hideSearch(searchForm);
    });
    $("#profile-dropdown-close").click(function () {
        $(".profile-dropdown").slideUp();
    });

    // read more/less 
    $(".review-read-more").click(function () {
        $(".review-read-more").css("display", "none");
        $(".review-read-less").css("display", "block");
        $(".review-text-hidden").slideDown();
    });
    $(".review-read-less").click(function () {
        $(".review-read-more").css("display", "inline");
        $(".review-read-less").css("display", "none");
        $(".review-text-hidden").slideUp();
    });

    // open file on image click -profile
    $('.open-file').click(function () {
        $('.add-profile-img').click();
    });
    // open file on image click -company
    $('.add-profile-img').click(function () {
        $('#add-profile-img').click();
    });
     // open optional file on click -company
    $('#add-images-click').click(function (e) {
        e.preventDefault();
        $('#optionalImage').click();
    });
    $("#open-working-hours-popup").click(function (e) {
        e.preventDefault();
        $(".popup-overlay-open").show();
        $("#working-hours-popup").show(300);
    });

    //  open/close mobile menu
    $(".navigation-trigger").click(function () {
        $(".navigation-wrapper").slideToggle();
    });

    //  open/close notifications menu
    $("#notification-trigger").click(function () {
        $(".profile-notifications-dropdown").slideToggle();
        $hideElements(profileDropdown);
        $hideSearch(searchForm);
    });

    // open/close filters extend div
    $("#filters-trigger").click(function () {
        $(".filters-expand").slideToggle();
    });

    // open/close address box
    $(".results-address-trigger").click(function () {
        $(this).siblings(".results-address-expand").slideToggle();
    });

    $("#changeCategory").change(function () {
        advancedSearch();
    });
    $("#changeCity").change(function () {
        advancedSearch();
    });
    $("#nonstop").change(function () {
        advancedSearch();
    });
    $("#delivery").change(function () {
        advancedSearch();
    });
    $("#onlineBanking").change(function () {
        advancedSearch();
    });
    $("#distanceSort").change(function () {
        advancedSearch();
    });
    $(".remove-image-span").click(function () {
        $('#add-images-pop').show(500);
        $('.remove-image-action-btn').attr('id', $(this).data('imageid'));
        $('.popup-overlay-open').show();
    });
    $(".remove-image-action-btn").click(function () {
        window.location.replace(document.location.origin + "/delete/image/" + $(this).attr('id'));
    });

    // open/close company edit info-sets

    $(".set-2").click(function () {
        if ($('.info-set-2').css('display') == 'none') {
            $('.info-set-2').slideDown(500);
            $(".set-2").attr('src', '/img/template-icons/dropdown-selector-close.png')
        } else {
            $('.info-set-2').slideUp(500);
            $(".set-2").attr('src', '/img/template-icons/dropdown-selector.png')
        }
    });

    $(".set-3").click(function () {
        if ($('.info-set-3').css('display') == 'none') {
            $('.info-set-3').slideDown(500);
            $(".set-3").attr('src', '/img/template-icons/dropdown-selector-close.png')
        } else {
            $('.info-set-3').slideUp(500);
            $(".set-3").attr('src', '/img/template-icons/dropdown-selector.png')
        }
    });

    // set up popup days
    var mon = $('#mon'),
        tue = $('#tue'),
        wed = $('#wed'),
        thu = $('#thu'),
        fri = $('#fri'),
        sat = $('#sat'),
        sun = $('#sun');
        selectWorkHours(mon, 'mon');
        selectWorkHours(tue, 'tue');
        selectWorkHours(wed, 'wed');
        selectWorkHours(thu, 'thu');
        selectWorkHours(fri, 'fri');
        selectWorkHours(sat, 'sat');
        selectWorkHours(sun, 'sun');

      
        
    // Set up menu hover
    navigationItem.hover(function () {
        /* Stuff to do when the mouse enters the element */
        $(this).find('.navigation-dropdown-dec').css('display', 'block')
        //$hideElements(profileDisplay);
        //$hideElements(profileDropdown);
        $hideSearch(searchForm);


    }, function () {
        /* Stuff to do when the mouse leaves the element */
        $(this).find('.navigation-dropdown-dec').css('display', 'none')
    });

    // select conversations
    $('.tabs-sidebar ul li:first-child a').addClass(' selected-conversation');
    $('.tabs-sidebar ul li:first-child').css('background', '#fff');
    
    $('.tabs-sidebar ul li a').click(function () {
         $('.tabs-sidebar ul li a').removeClass(' selected-conversation');
         $(this).addClass(' selected-conversation');
         $('.tabs-sidebar ul li').css('background', '#fff');
    });

    //show/hide elements
    var $hideElements = function (element) {
        if (element.css('display') == 'block') {
            element.slideToggle();
        }
    }

    var $hideSearch = function (element) {
        if (element.css('display') == 'block') {
            element.hide(500);
        }
    }
});

function advancedSearch() {
    var url = document.location.origin + document.location.pathname.slice(0, 3);
    var town = $("#changeCity").val();
    var category = $("#changeCategory").val();
    var nonstop = $('#nonstop').prop('checked');
    var delivery = $('#delivery').prop('checked');
    var online = $('#onlineBanking').prop('checked');
    var distSort = $('#distanceSort').prop('checked');
    var distFilter = $('#distanceFilter').val();

    if (town == null) {
        town = "";
    }
    if (category == null) {
        category = "";
    }

    nonstop != false ? 1 : 0;
    delivery != false ? 1 : 0;
    online != false ? 1 : 0;
    distSort != false ? 1 : 0;

    url = url + "/napredna-pretraga" + "?town=" + town + "&category=" + category + "&nonstop=" + nonstop;
    url = url + "&delivery=" + delivery + "&online=" + online + "&distSort=" + distSort + "&distFilter=" + distFilter;

    var userLocationData = localStorage.getItem('userLocationData');
    userLocationData = JSON.parse(userLocationData);

    if (userLocationData) {
        url = url + "&lat=" + userLocationData.lat + "&lng=" + userLocationData.lng;
    }

    window.location.replace(url);
}

function selectWorkHours(dom, day) {
    $(dom).click(function () {
        if (this.checked) {
            $('#' + day + '-from').css('background', '#f1f1f1')
            $('#' + day + '-to').css('background', '#f1f1f1')
            $('#' + day + '-from').prop("disabled", false);
            $('#' + day + '-to').prop("disabled", false);
        } else {
            $('#' + day + '-from').css('background', '#fff')
            $('#' + day + '-to').css('background', '#fff')
            $('#' + day + '-from').prop("disabled", true);
            $('#' + day + '-to').prop("disabled", true);
        }
    });
}

function openSubC(id){
    $('.subcategories-footer').hide();
    $('#subc_' + id).css('display', "block");
    $('.footer-navigation ul li a').removeClass('on-link');
    $('#cat_' + id).addClass('on-link');
}
function showVal(val){
    document.getElementById('range').innerHTML = val;
}