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
        axios.get('http://127.0.0.1:8000/forces')
        .then((response)=>{
            console.log(response);
            this.setState({
                forces : response.data,
                spinner : false
            });
        }).catch((e)=>{
            console.log('fallo por: '+e);
        });
    }
    render(){
        return(
            <div className='principal'>
                {this.state.spinner ? <RmSpinner/> : 
                    <div>
                        <Table responsive>
                            <thead>
                                <tr>
                                <th className='letterStyle'>Name</th>
                                </tr>
                            </thead>
                            <tbody>                    
                                {this.state.forces.map((e,key)=>                                    
                                    <tr key={key}>
                                        <td>
                                            <Link  to={`/${e.force_id}`}>
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