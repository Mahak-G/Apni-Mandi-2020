paypal.minicart.render();

		paypal.minicart.cart.on('checkout', function (evt) {
			var items = this.items(),
				
				len = items.length,
				total = 0,
				quan
				i;
			for (i = 0; i < len; i++) {
				total += items[i].get('quantity')*items[i].get('amount');
				quan[i]=items[i].get('quantity');
			}
			document.cookie = 'prod='+total;
			document.cookie = 'payment=true';
			$.cookie('details', JSON.stringify(items));
			$.cookie('quantity',JSON.stringify(quan));
			if (total ==0) {
				alert('your cart is empty');
				evt.preventDefault();
			}