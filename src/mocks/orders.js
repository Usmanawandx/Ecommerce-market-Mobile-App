const orders = [
  {
    id: 1,
    orderNumber: 'ECP284849839',
    total: '$295',
    shippingFee: '$14',
    subtotal: '$539',
    shopId: 1,
    numberOfProducts: 5,
    status: 'completed',
  },
  {
    id: 2,
    orderNumber: 'ECP394839939',
    total: '$98',
    shippingFee: '$14',
    subtotal: '$539',
    shopId: 2,
    numberOfProducts: 10,
    status: 'completed',
  },
  {
    id: 3,
    orderNumber: 'ECP483849234',
    total: '$104.99',
    shippingFee: '$14',
    subtotal: '$539',
    shopId: 4,
    numberOfProducts: 2,
    status: 'completed',
  },
  {
    id: 4,
    orderNumber: 'ECP214333449',
    total: '$50',
    shippingFee: '$14',
    subtotal: '$539',
    shopId: 1,
    numberOfProducts: 1,
    status: 'to receive',
  },
  {
    id: 5,
    orderNumber: 'ECP433349469',
    total: '$150',
    shippingFee: '$14',
    subtotal: '$539',
    shopId: 3,
    numberOfProducts: 4,
    status: 'to ship',
  },
  {
    id: 6,
    orderNumber: 'ECP104549335',
    total: '$708',
    shippingFee: '$14',
    subtotal: '$539',
    shopId: 2,
    numberOfProducts: 3,
    status: 'to pay',
  },
];

export const getOrders = () => orders;
export const getOrdersWhere = (where) => orders.filter(where);
export const getOrderById = (id) => orders.find((order) => order.id === id);