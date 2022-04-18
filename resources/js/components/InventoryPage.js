import React, { Component, useState } from "react";
import ReactDOM from "react-dom";
import { Button, Table, Modal, ModalHeader, ModalBody, ModalFooter, Input, FormGroup, Label} from "reactstrap";
import axios from "axios";
import { FilePond, File, registerPlugin } from 'react-filepond'
import 'filepond/dist/filepond.min.css'
import FilePondPluginImageExifOrientation from 'filepond-plugin-image-exif-orientation'
import FilePondPluginImagePreview from 'filepond-plugin-image-preview'
import 'filepond-plugin-image-preview/dist/filepond-plugin-image-preview.css'
import Switch from 'react-input-switch';

registerPlugin(FilePondPluginImageExifOrientation, FilePondPluginImagePreview)
import "bootstrap/dist/css/bootstrap.min.css";

export default class InventoryPage extends Component {
    constructor() {
        super();
        this.state = {
            inventories: [],
            NewInventoryModal: false,
            EditInventoryModal: false,
            newInventoryData: { name: "", size_S: "", size_M: "",size_L: "", unit_price: "", category: "", status: "", description: "" },
            editInventoryData: { id: "", name: "", size_S: "", size_M: "", size_L: "", unit_price: "", category: "", status: "", description: "" },     
        };
    }

    handleInit() {
        console.log("FilePond instance has initialised", this.pond);
        }

    showInventory() {
        axios.get("http://127.0.0.1:8000/api/inventory").then((response) => {
            this.setState({
                inventories: response.data,
            });
        });
    }

    addInventory() {
        axios.post("http://127.0.0.1:8000/api/inventory/create",this.state.newInventoryData).then((response) => {
                this.showInventory();
                this.setState({
                    NewInventoryModal: !this.state.NewInventoryModal,
                    newInventoryData: { name: "", size_S: "", size_M: "", size_L: "", unit_price: "", category: "", status: "", description: "" },
                });
            });
    }

    toggleNewInventoryModal() {
        this.setState({
            NewInventoryModal: !this.state.NewInventoryModal,
        });
    }

    editInventory() {
        let { id, name, size_S, size_M, size_L, unit_price, category, status, description } = this.state.editInventoryData;
        axios.put("http://127.0.0.1:8000/api/inventory/update/" + id, { name, size_S, size_M, size_L, unit_price, category, status, description}) .then((response) => {
            this.showInventory();
                this.setState({
                    EditInventoryModal: !this.state.EditInventoryModal,
                    editInventoryData: { id: "", name: "", size_S: "", size_M: "", size_L: "", unit_price: "", category: "", status: "", description: "" },
                });
            });
    }

    toggleEditInventoryModal(id, name, size_S, size_M, size_L, unit_price, category, status, description) {
        this.setState({
            editInventoryData: { id, name, size_S, size_M, size_L, unit_price, category, status, description },
            EditInventoryModal: !this.state.EditInventoryModal,
        });
    }

    deleteInventory(id) {
        axios.delete("http://127.0.0.1:8000/api/inventory/delete/" + id).then((response) => { this.showInventory() });
    }

    componentDidMount() {
        this.showInventory();
    } 

    render() {
        let inventories = this.state.inventories.map((inventory) => {
            return (              
                <tr key={inventory.id}>
                    <td>{inventory.id}</td>
                    <td>{inventory.name}</td>
                    <td>{inventory.size_S}</td>
                    <td>{inventory.size_M}</td>
                    <td>{inventory.size_L}</td>
                    <td>{inventory.unit_price}</td>
                    <td>{inventory.category}</td>
                    <td>{inventory.status}</td>
                    <td>{inventory.description}</td>
                    <td><Button onClick={this.toggleEditInventoryModal.bind(this, inventory.id, inventory.name, inventory.size_S, inventory.size_M, inventory.size_L, inventory.unit_price, inventory.category, inventory.status, inventory.description)} size="sm" color="success">
                            Edit
                        </Button></td>
                    <td><Button onClick={this.deleteInventory.bind(this, inventory.id)} size="sm" color="danger">Delete</Button></td>
                </tr>
            );
        });
        
        return (
            <div className="container">
                <Table striped responsive>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Item Name</th>
                            <th>Size S</th>
                            <th>Size M</th>
                            <th>Size L</th>
                            <th>Unit Price</th>
                            <th>Category</th>
                            <th>Status</th>
                            <th>Description</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                    <tbody>{inventories}</tbody>
                </Table>
                <Button color="primary" onClick={this.toggleNewInventoryModal.bind(this)}>Add Product</Button>
                <Modal isOpen={this.state.NewInventoryModal}>
                    <ModalHeader>Add Product</ModalHeader>
                    <ModalBody>
                        <FormGroup>
                            <Label for="name">Item Name</Label>
                            <Input id="name" value={this.state.newInventoryData.name}
                                onChange={(e) => {
                                    let { newInventoryData } = this.state;
                                    newInventoryData.name = e.target.value;
                                    this.setState({ newInventoryData });
                                } }/>
                            <Label for="size_S">Quantity(Size S)</Label>
                            <Input id="size_S" value={this.state.newInventoryData.size_S}
                                onChange={(e) => {
                                    let { newInventoryData } = this.state;
                                    newInventoryData.size_S = e.target.value;
                                    this.setState({ newInventoryData });
                                } }/>
                            <Label for="size_M">Quantity(Size M)</Label>
                            <Input id="size_M" value={this.state.newInventoryData.size_M}
                                onChange={(e) => {
                                    let { newInventoryData } = this.state;
                                    newInventoryData.size_M = e.target.value;
                                    this.setState({ newInventoryData });
                                } }/>
                            <Label for="size_L">Quantity(Size L)</Label>
                            <Input id="size_L" value={this.state.newInventoryData.size_L}
                                onChange={(e) => {
                                    let { newInventoryData } = this.state;
                                    newInventoryData.size_L = e.target.value;
                                    this.setState({ newInventoryData });
                                } }/>
                            <Label for="unit_price">Unit Price</Label>
                            <Input id="unit_price" value={this.state.newInventoryData.unit_price}
                                onChange={(e) => {
                                    let { newInventoryData } = this.state;
                                    newInventoryData.unit_price = e.target.value;
                                    this.setState({ newInventoryData });
                                } }/>
                            <Label for="category">Category</Label>
                            <Input id="category" name="select" type="select" value={this.state.newInventoryData.category}
                                onChange={(e) => {
                                    let { newInventoryData } = this.state;
                                    newInventoryData.category = e.target.value;
                                    this.setState({ newInventoryData });
                                } }>
                                <option>Please choose 1</option>
                                <option value="Graphic T-Shirts"> Graphic T-Shirts</option>
                                <option value="Long Sleeve Shirts"> Long Sleeve Shirts</option>
                                <option value="Polos">Polos</option>
                            </Input>
                            <Label for="status">Status</Label>
                            <Input id="status" name="select" type="select" value={this.state.newInventoryData.status}
                                onChange={(e) => {
                                    let { newInventoryData } = this.state;
                                    newInventoryData.status = e.target.value;
                                    this.setState({ newInventoryData });
                                } }>
                                <option>Please choose 1</option>
                                <option value="1"> Active</option>
                                <option value="0"> Inactive</option>
                            </Input>
                        <Label for="description">Description</Label>
                        <Input id="description" value={this.state.newInventoryData.description}
                            onChange={(e) => {
                                let { newInventoryData } = this.state;
                                newInventoryData.description = e.target.value;
                                this.setState({ newInventoryData });
                            } }/>
                        <div className="App">
                            <FilePond
                                ref={ref => (this.pond = ref)}
                                files={this.state.files}
                                allowMultiple={true}
                                allowReorder={true}
                                maxFiles={3}
                                server="/api/upload"
                                name="files"
                                oninit={() => this.handleInit()}
                                onupdatefiles={fileItems => {
                                    this.setState({
                                        files: fileItems.map(fileItem => fileItem.file)
                                    });
                                } } />
                        </div>
                    </FormGroup>
                </ModalBody>
                <ModalFooter>
                    <Button onClick={this.addInventory.bind(this)} size="sm" color="success"> Add</Button> &nbsp;
                    <Button onClick={this.toggleNewInventoryModal.bind(this)} size="sm" color="danger">Cancel</Button>
                </ModalFooter>
            </Modal><Modal isOpen={this.state.EditInventoryModal}>
                    <ModalHeader>Edit Product</ModalHeader>
                    <ModalBody>
                        <FormGroup>
                            <Label for="name">Item Name</Label>
                            <Input id="name" value={this.state.editInventoryData.name}
                                onChange={(e) => {
                                    let { editInventoryData } = this.state;
                                    editInventoryData.name = e.target.value;
                                    this.setState({ editInventoryData });
                                } }/>
                            <Label for="size_S">Quantity(Size S)</Label>
                            <Input id="size_S" value={this.state.editInventoryData.size_S}
                                onChange={(e) => {
                                    let { editInventoryData } = this.state;
                                    editInventoryData.size_S = e.target.value;
                                    this.setState({ editInventoryData });
                                } }/>
                            <Label for="size_M">Quantity(Size M)</Label>
                            <Input id="size_M" value={this.state.editInventoryData.size_M}
                                onChange={(e) => {
                                    let { editInventoryData } = this.state;
                                    editInventoryData.size_M = e.target.value;
                                    this.setState({ editInventoryData });
                                } }/>
                            <Label for="size_L">Quantity(Size L)</Label>
                            <Input id="size_L" value={this.state.editInventoryData.size_L}
                                onChange={(e) => {
                                    let { editInventoryData } = this.state;
                                    editInventoryData.size_L = e.target.value;
                                    this.setState({ editInventoryData });
                                } }/>
                            <Label for="unit_price">Unit Price</Label>
                            <Input id="unit_price" value={this.state.editInventoryData.unit_price}
                                onChange={(e) => {
                                    let { editInventoryData } = this.state;
                                    editInventoryData.unit_price = e.target.value;
                                    this.setState({ editInventoryData });
                                } }/>
                            <Label for="category">Category</Label>
                            <Input id="category" name="select" type="select" value={this.state.editInventoryData.category}
                                onChange={(e) => {
                                    let { editInventoryData } = this.state;
                                    editInventoryData.category = e.target.value;
                                    this.setState({ editInventoryData });
                                } }>
                                <option>Please choose 1</option>
                                <option value="Graphic T-Shirts">Graphic T-Shirts</option>
                                <option value="Long Sleeve Shirts">Long Sleeve Shirts</option>
                                <option value="Polos">Polos</option>
                            </Input>
                            <Label for="status">Status</Label>
                            <Input id="status" name="select" type="select" value={this.state.editInventoryData.status}
                                onChange={(e) => {
                                    let { editInventoryData } = this.state;
                                    editInventoryData.status = e.target.value;
                                    this.setState({ editInventoryData });
                                } }>
                                <option>Please choose 1</option>
                                <option value="1">Active</option>
                                <option value="0">Inactive</option>
                            </Input>
                            <Label for="description">Description</Label>
                            <Input id="description" value={this.state.editInventoryData.description}
                                onChange={(e) => {
                                    let { editInventoryData } = this.state;
                                    editInventoryData.description = e.target.value;
                                    this.setState({ editInventoryData });
                                } }/>
                        </FormGroup>
                    </ModalBody>
                    <ModalFooter>
                        <Button onClick={this.editInventory.bind(this)} size="sm" color="success"> Edit </Button> &nbsp;
                        <Button onClick={this.toggleEditInventoryModal.bind(this)} size="sm" color="danger"> Cancel </Button>
                    </ModalFooter>
                </Modal>
            </div>
        );
        
    }
}

if (document.getElementById("inventorypage")) {
    ReactDOM.render(<InventoryPage />,document.getElementById("inventorypage")); 
}
