import React,{ Component } from 'react';
import {
    Collapse,
    Navbar,
    NavbarToggler,
    NavbarBrand,
    Nav,
    NavItem,
    NavLink,
     } from 'reactstrap';

class RmHeader extends Component{

    constructor(props) {
        super(props);
    
        this.toggle = this.toggle.bind(this);
        this.state = {
          isOpen: false
        };
      }
      toggle() {
        this.setState({
          isOpen: !this.state.isOpen
        });
      }
    render(){
        return(
            <div>
                <Navbar color="primary" light expand="md">
                    <NavbarBrand href="/">UK Police</NavbarBrand>
                    <NavbarToggler onClick={this.toggle} />
                    <Collapse isOpen={this.state.isOpen} navbar>
                        <Nav className="ml-auto" navbar>
                            <NavItem>
                                <NavLink  href="/forces">Forces</NavLink>
                            </NavItem>
                            <NavItem>
                                <NavLink href="/crime">Crime</NavLink>
                            </NavItem>
                            <NavItem>
                                <NavLink href="/stopAndSearch">Stop and search</NavLink>
                            </NavItem>
                        </Nav>
                   </Collapse>
                </Navbar>
            </div>
        );
    }
}

export default RmHeader;