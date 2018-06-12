import React,{ Component } from 'react';
import axios from 'axios';

import {Table} from 'reactstrap';

import {Link} from 'react-router-dom';

class RmForces extends Component{

    constructor(){
        super();
        
        this.state = {
            forces : []
        }
    }

    componentDidMount(){
        axios.get('https://data.police.uk/api/forces')
        .then((response)=>{
            this.setState({
                forces : response.data
            });
        }).catch((e)=>{
            console.log(e);
        });
    }
    render(){
        return(
            <div>
            <Table responsive>
                <thead>
                    <tr>
                    <th>Name</th>
                    </tr>
                </thead>
                <tbody>                    
                    {this.state.forces.map((e,key)=>
                        
                        <tr key={key}>
                            <Link to={`/${e.id}`}><td> {e.name}</td> </Link>
                        </tr>   
                        
                    )}                    
                </tbody>
            </Table>
            </div>
        );
    }
}

export default RmForces;