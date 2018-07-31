new Vue({
  el: "#app",
  data: {
    products: [
      {
        image: "https://via.placeholder.com/200x150",
        name: "Top up Value",
        // description: "15CM X 15CM",
        price: 5,
        quantity: 2
      },
      {
        image: "https://via.placeholder.com/200x150",
        name: "Top up Value",
        // description: "60CM X 25CM",
        price: 15,
        quantity: 1
      }
    ],
    tax: 5,
    promotions: [
      {
        code: "locker50",
        discount: "50%"
      },
      {
        code: "locker40",
        discount: "40%"
      },
      {
        code: "locker30",
        discount: "30%"
      }
    ],
    promoCode: "",
    discount: 0
  },
  computed: {
    itemCount: function() {
      var count = 0;

      for (var i = 0; i < this.products.length; i++) {
        count += parseInt(this.products[i].quantity) || 0;
      }

      return count;
    },
    subTotal: function() {
      var subTotal = 0;

      for (var i = 0; i < this.products.length; i++) {
        subTotal += this.products[i].quantity * this.products[i].price;
      }

      return subTotal;
    },
    discountPrice: function() {
      return this.subTotal * this.discount / 100;
    },
    totalPrice: function() {
      return this.subTotal - this.discountPrice;
    }
  },
  filters: {
    currencyFormatted: function(value) {
      return Number(value).toLocaleString("en-US", {
        style: "currency",
        currency: "USD"
      });
    }
  },
  methods: {
    updateQuantity: function(index, event) {
      var value = event.target.value;
      var product = this.products[index];

      // Minimum quantity is 1, maximum quantity is 100, can left blank to input easily
      if (value === "" || (parseInt(value) > 0 && parseInt(value) < 100)) {
        product.quantity = value;
      }

      this.$set(this.products, index, product);
    },
    checkQuantity: function(index, event) {
      // Update quantity to 1 if it is empty
      if (event.target.value === "") {
        var product = this.products[index];
        product.quantity = 1;
        this.$set(this.products, index, product);
      }
    },
    removeItem: function(index) {
      this.products.splice(index, 1);
    },
    checkPromoCode: function() {
      for (var i = 0; i < this.promotions.length; i++) {
        if (this.promoCode === this.promotions[i].code) {
          this.discount = parseFloat(
            this.promotions[i].discount.replace("%", "")
          );
          return;
        }
      }

      alert("Sorry, the Promotional code you entered is not valid!");
    }
  }
});
