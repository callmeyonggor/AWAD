import axios from "axios";
import React, {Component} from "react";
import reactDom from "react-dom";
import {Table, Button, Modal, ModalBody, ModalHeader, ModalFooter, FormGroup, Input, Label} from "reactstrap";

export default class UserTable extends Component {

  constructor(){
    super()
    this.state = {
      accounts:[],
      editAccountModal:false,
      data:{id:"", name:"", email:""},
    }
  }

  loadAccount(){
    axios.get('http://127.0.0.1:8000/api/useraccount').then((response)=> {
      this.setState({
        accounts:response.data
      })
    })
  }

  componentDidMount(){
    this.loadAccount()
  }

  toggleEditAccountModal(id, name, email){
    this.setState({
      editAccountModal:!this.state.editAccountModal,
      data:{id, name, email}
    })
  }

  editAccount(){
    let{id, name, email} = this.state.data
    axios.put('http://127.0.0.1:8000/api/useraccount/update/'+id, {name, email}).then((response)=> {
      this.setState({
        editAccountModal:!this.state.editAccountModal,
        data:{id:"", name:"", email:""}
      })
      this.loadAccount()
    })
  }

  deleteAccount(id){
    axios.put('http://127.0.0.1:8000/api/useraccount/delete/'+id).then((response)=> {
      this.loadAccount()
    })
  }

  render(){
    let accounts = this.state.accounts.map((account)=>{
      return(
        <tr key={account.id}>
          <td>{account.id}</td>
          <td>{account.name}</td>
          <td>{account.email}</td>
          <td>
            <Button onClick={this.toggleEditAccountModal.bind(this, account.id, account.name, account.email)} size="sm" color="success">Edit</Button> &nbsp;
            <Modal isOpen={this.state.editAccountModal}>
              <ModalHeader>Edit Account</ModalHeader>
              <ModalBody>
                <FormGroup>
                  <Label for ="name">Name</Label>
                  <Input id ="name" value={this.state.data.name} 
                    onChange={(e)=>{
                    let {data}=this.state 
                    data.name=e.target.value 
                    this.setState({data})}}></Input><br></br>
                  <Label for ="email">Email</Label>
                  <Input id ="email" value={this.state.data.email}
                    onChange={(e)=>{
                    let {data}=this.state 
                    data.email=e.target.value 
                    this.setState({data})}}></Input>
                </FormGroup>
              </ModalBody>
              <ModalFooter>
                <Button onClick={this.editAccount.bind(this)} size="sm" color="success">Update</Button> &nbsp;
                <Button onClick={this.toggleEditAccountModal.bind(this)} size="sm" color="danger">Cancel</Button>
              </ModalFooter>
            </Modal>
            <Button onClick={this.deleteAccount.bind(this, account.id)} size="sm" color="danger">Delete</Button>
          </td>
        </tr>
      )
    })
    return(
      <div className="container">
          <Table>
              <thead>
                  <tr>
                      <th>#</th>
                      <th>Name</th>
                      <th>Email</th>
                  </tr>
              </thead>
              <tbody>
                  {accounts}
              </tbody>
          </Table>
      </div>
      )
  }
}

if (document.getElementById('UserTable')){
    reactDom.render(<UserTable />, document.getElementById('UserTable'));
}