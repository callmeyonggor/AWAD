import React, { useState, useEffect } from 'react';
import ReactDOM from 'react-dom';
import  { Table, Button } from 'reactstrap';
import axios from 'axios';

function Invoice(props) {
    const [order, setOrder] = useState([]);
    const [invoice, setInvoice] = useState(props.invoice);
    const [invoiceID, setInvoiceID] = useState(null);

    useEffect(() => {
        //console.log(invoice);
        if(invoice != null) {
            setInvoiceID(invoice.id);
            
        }
        console.log(invoiceID);
        setInvoiceID(invoice);
        if(invoiceID != null) {
            
            retrieveOrder();
        }
        
    });
    //console.log(props);
    //console.log(invoice);
    const retrieveInvoice = () => {
        axios.get('http://localhost:8000/api/getinvoice/' + invoiceID).then((response) => {
            setOrder(response.data);
        })
    }

    const retrieveOrder = () => {
        axios.get('http://localhost:8000/api/getallorder/' + invoiceID).then((response) => {
            setInvoice(response.data);
        })
    }

    const orderList = () => {
        if(order != []) {
            return order.map((item, index) => {
                return (
                    <tr key={index}>
                        <td>{item.itemID}</td>
                        <td>{item.Qty}</td>
                        <td>Unit Price</td>
                        <td>Order Price</td>
                    </tr>
                );
            })
        }
    };

    return (
        <div className="container">
            <div className="row justify-content-center">
                <div className="col-md-8">
                    <div className="card">

                        <div className="card-body">
                            <Table>
                                    <thead>
                                        <tr>
                                        <th>Product Name</th>
                                        <th>Quantity</th>
                                        <th>Unit Price</th>
                                        <th>Order Price</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        {orderList()}
                                    </tbody>
                                </Table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    );
}

export default Invoice;

if (document.getElementById('Invoice')) {
    const element = document.getElementById('Invoice');
    const props= Object.assign({}, element.dataset)
    console.log(props.invoice);
    ReactDOM.render(<Invoice invoice = {props.invoice} />, document.getElementById('Invoice'));
}
