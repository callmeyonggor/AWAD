import React, { useState, useEffect } from 'react';
import ReactDOM from 'react-dom';
import  { Table, Button, Modal, ModalHeader, ModalBody, ModalFooter } from 'reactstrap';
import axios from 'axios';
import 'bootstrap/dist/css/bootstrap.min.css';


function InvoiceList() {
    const [invoice, setInvoice] = useState([]);
    const [order, setOrder] = useState([]);
    const [show, setShow] = useState(false);
    const [tempInvoice, setTempInvoice] = useState(null);

    useEffect(() => {
        retrieveInvoice();
    });

    useEffect(() => {
        if(tempInvoice != null) {
            retrieveOrder();
            console.log(Object.keys(tempInvoice));
        }
    }, [tempInvoice]);

    const retrieveInvoice = () => {
        axios.get('http://localhost:8000/api/getallinvoice').then((response) => {
            setInvoice(response.data);
        })
    }

    const retrieveOrder = () => {
        axios.get('http://localhost:8000/api/getallorder/' + tempInvoice['id']).then((response) => {
            setOrder(response.data);
        })
    }

    const getRow = (item) => {
        setTempInvoice(item);
    }

    const handleShow = () => {
        setShow(true);
    }
    
    const handleClose = () => {
        setShow(false);
    }

    const invoiceList = () => {
        return invoice.map((item, index) => {
            return (
                <tr key={index}>
                    <td>{item.id}</td>
                    <td>{item.invoice_total}</td>
                    <td>{item.created_at}</td>
                    <td><Button onClick={() => {
                        handleShow();
                        getRow(item);
                    }}
                    color = "success" size="sm" outline>View</Button></td>
                </tr>
            );
        })
    };

    const orderList = () => {
        if(order != []) {
            return order.map((item, index) => {
                return (
                    <tr key={index}>
                        <td>{item.ItemID}</td>
                        <td>{item.Size}</td>
                        <td>{item.Qty}</td>
                        <td>Unit Price</td>
                        <td>Order Price</td>
                    </tr>
                );
            })
        }
    };

    const convertTimestamp = (timestamp) => {
        console.log(typeof timestamp);
        var d = new Date(timestamp);
        var date = d.getHours() + ":" + d.getMinutes() + ", " + d.toDateString();
        return date;
    }

    return(
        <div className="container">
                <div className="row justify-content-center">
                    <div className="col-md-30">
                        <div className="card">
    
                            <div>
                                <Table>
                                    <thead>
                                        <tr>
                                        <th>Invoice Number</th>
                                        <th>Total Payment</th>
                                        <th>Created Date</th>
                                        <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        {invoiceList()}
                                    </tbody>
                                </Table>
                            </div>
                            <Modal isOpen={show} toggle={()=> {handleShow()}} size="lg" style={{maxWidth: '700px', width: '100%'}}>
                                <ModalHeader >                         
                                        <div style={{flexDirection: "column"}}>
                                        {tempInvoice != null
                                            ?<><div className="d-flex justify-content-center mb-2">
                                                Invoice {tempInvoice.id} 
                                            </div>
                                            <div className="d-flex justify-content-center">
                                                {convertTimestamp(tempInvoice.created_at)}
                                            </div></>
                                            : null
                                        }
                                        </div>
                                </ModalHeader>
                                <ModalBody>
                                <div style={{fontSize: '15px'}}>
                                    
                                    {tempInvoice != null
                                    ?
                                    <><h3 style={{fontSize: '15px'}}>Bill to:</h3>
                                    <br />
                                    <h5>{tempInvoice.created_at}</h5>
                                    <h5 style={{fontSize: '15px'}}>Name: {tempInvoice.name}</h5>
                                    <h5 style={{fontSize: '15px'}}>Company Name: {tempInvoice.company_name}</h5>
                                    <h5 style={{fontSize: '15px'}}>Address: {tempInvoice.address}</h5>
                                    <h5 style={{fontSize: '15px'}}>Phone Number: {tempInvoice.phone}</h5>
                                    <br /></>
                                    : null
                                    }
                                </div>
                                <Table>
                                    <thead>
                                        <tr>
                                        <th>Product Name</th>
                                        <th>Size</th>
                                        <th>Quantity</th>
                                        <th>Unit Price</th>
                                        <th>Order Price</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        {orderList()}
                                    </tbody>
                                </Table>
                                <div style={{textAlign: 'right',
                                            paddingRight: '50px',
                                           }}>
                                    {tempInvoice != null
                                        ? <p>Total Price: {tempInvoice.invoice_total}</p>
                                        : null
                                    }
                                </div>
                                </ModalBody>
                                <ModalFooter>
                                    <Button color="primary" onClick={() => {
                                        handleClose();
                                    }}>Close</Button>
                                </ModalFooter>
                            </Modal>
                        </div>
                    </div>
                </div>
        </div>
    );
}

export default InvoiceList;

if (document.getElementById('InvoiceList')) {
    ReactDOM.render(<InvoiceList />, document.getElementById('InvoiceList'));
}
