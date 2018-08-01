String.prototype.replaceAt = function(index, character) {
  return (
    this.substr(0, index) + character + this.substr(index + character.length)
  );
};

String.prototype.insert = function(index, string) {
  if (index > 0)
    return (
      this.substring(0, index) + string + this.substring(index, this.length)
    );
  else return string + this;
};

var typeValue, typeText, cardType, cardName, cardNumber, cardDate, cardId;

$(".overlay").hide();

$("#add").on("click", function(e) {
  e.preventDefault();
  $(".overlay").fadeIn(300);
});

$(".activity")
  .not(".activity.active")
  .hide();

function tabTrigger() {
  $(".card").click(function(e) {
    e.preventDefault();
    $(".card").removeClass("active");
    $(this).addClass("active");

    $(".activity").hide();
    $('.activity[data-id="' + $.attr(this, "data-id") + '"').fadeIn();
  });
}

tabTrigger();

$(".card-form .button").on("click", function(e) {
  cardName = $("#cardName").val();
  cardNumber = $("#cardNumber").val();
  for (var i = 0; i < 12; i++) {
    cardNumber = cardNumber.replaceAt(i, "*");
  }
  cardDate = $("#cardDate").val();
  cardCVS = $("#cardCVS").val();

  if ($(".type-form").length) {
    alert("Please complete card type.");
  } else if (cardName == "") {
    alert("Card name appears to be empty.");
  } else if (cardNumber == "") {
    alert("Card number appears to be empty.");
  } else if (cardNumber.length != 16) {
    alert("Card number appears to be less then 16 characters.");
  } else if (cardDate == "") {
    alert("Card date appears to be empty.");
  } else if (cardCVS == "") {
    alert("Card CVS appears to be empty.");
  } else {
    for (var i = 1; i < 4; i++) {
      cardNumber = cardNumber.insert(5 * i - 1, " ");
    }

    cardType = $(".type").text();

    cardId = cardNumber.charAt(15);
    cardId += cardNumber.charAt(16);
    cardId += cardNumber.charAt(17);
    cardId += cardNumber.charAt(18);

    e.preventDefault();
    $(".overlay").fadeOut(300);

    $(".cards .content").append(
      '<div class="card" data-id="' +
        cardId +
        '"><img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/169963/' +
        cardType +
        '.png"/> <div class="number">' +
        cardNumber +
        '</div> <div class="expiration">Valid Thru: ' +
        cardDate +
        "</div> </div>"
    );

    $(".wallet").append(
      $(
        '<div data-id="' +
          cardId +
          '" class="activity"> <header> <h2>Balance</h2><span>$0.<i>00</i></span> </header> <div class="content"> <div class="transaction transaction-empty">It seems you have no recent transactions.</div></div>'
      ).hide()
    );

    tabTrigger();
    // Addin Account Balance

    $(".form input").val("");
  }
});

$(".close").on("click", function(e) {
  $(".overlay").fadeOut(300);
});

function typeChange() {
  typeText = $(".type").text();

  $(".type").on("click", function() {
    $(this).replaceWith(
      '<input class="type-form" type="text" value="' + typeText + '" />'
    );
  });
}

typeChange();

$(document).on("keydown", ".type-form", function(e) {
  if (e.keyCode == 13) {
    e.preventDefault();

    typeValue = $(".type-form").val();

    $(".type-form").replaceWith('<div class="type">' + typeValue + "</div>");

    typeChange();
  }
});


