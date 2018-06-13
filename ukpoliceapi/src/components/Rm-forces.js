import React,{ Component } from 'react';
import axios from 'axios';

import {Table} from 'reactstrap';

import {Link} from 'react-router-dom';

import RmSpinner from './Rm-spinner';

class RmForces extends Component{

    constructor(){
        super();
        
        this.state = {
            forces : [],
            spinner : true
        }
    }

    componentDidMount(){
        axios.get('https://data.police.uk/api/forces')
        .then((response)=>{
            this.setState({
                forces : response.data,
                spinner : false
            });
        }).catch((e)=>{
            console.log(e);
        });
    }
    render(){
        return(
            <div>
                {this.state.spinner ? <RmSpinner/> : 
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
                                        <td>
                                            <Link  to={`/${e.id}`}>
                                                {e.name}
                                            </Link>
                                        </td>
                                    </tr>  
                                )}                    
                            </tbody>
                        </Table>
                    </div>}
            </div>
        );
    }
}

export default RmForces;