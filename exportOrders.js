const axios = require('axios');
const fs = require('fs');




async function exportOrders() {
    try {
      const ordersResponse = await axios.get(
        `https://${SHOPIFY_DOMAIN}/admin/api/2023-10/orders.json?status=any&limit=250&fields=name,email,phone,billing_address,shipping_address,customer,line_items`,
        {
          headers: {
            'X-Shopify-Access-Token': ACCESS_TOKEN
          }
        }
      );
  
      const orders = ordersResponse.data.orders;
      let output = 'Order #,Waist,Inseam\n';
  
      for (const order of orders) {

        const customerName =
        order.customer && order.customer.default_address
            ? `${order.customer.default_address.first_name || ''} ${order.customer.default_address.last_name || ''}`
            : order.billing_address
            ? `${order.billing_address.first_name || ''} ${order.billing_address.last_name || ''}`
            : 'Guest';
  
        const email = order.email || '';
        const phone = order.phone || '';
  
        for (const item of order.line_items) {
            console.log('Line item properties:', item.properties);

          let waist = '';
          let inseam = '';
  
          if (item.properties && item.properties.length > 0) {
            for (const prop of item.properties) {
                if (!waist && !inseam) {
                    console.log(`❗ Missing size data in Order #${order.id} for item "${item.name}"`);
                  }
              if (prop.name.toLowerCase() === 'waist') waist = prop.value;
              if (prop.name.toLowerCase() === 'inseam') inseam = prop.value;
            }
          }
  
          output += `${order.name},${waist},${inseam}\n`;
        }
      }
  
      fs.writeFileSync('orders_with_sizes.csv', output);
      console.log('✅ File created: orders_with_sizes.csv');
    } catch (err) {
      console.error('❌ Error fetching orders:', err.response?.data || err.message);
    }
  }
  
  exportOrders();
