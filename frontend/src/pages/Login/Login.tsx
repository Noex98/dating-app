import React, { useState, useContext } from 'react'
import { apiModel } from '../../models/apiModel';
import { userContext } from '../../components';
import { useNavigate } from 'react-router-dom';

export const Login = () => {

    const user = useContext(userContext);
    const navigate = useNavigate();

    const [username, setUsername] = useState("");
    const [password, setPassword] = useState("");
    const [errMessage, setErrMessage] = useState("");

    function submitHandler(e: React.FormEvent){
        e.preventDefault();
        
        apiModel.login(username, password).then(res => {
            if(res.succes && user?.set){
                    user.set(res);
                    navigate('/profile');
            } else {
                setErrMessage(res.errMessage);
            }
        });
    }

    return (
        <>
            <h1>Login</h1>
            <form onSubmit={e =>submitHandler(e)}>
                <input type="text" onChange={e => setUsername(e.target.value)} />
                <input type="password" onChange={e => setPassword(e.target.value)} />
                <input type="submit" value="Log in" />
            </form>
            <div>{errMessage}</div>
        </>
    )
}
