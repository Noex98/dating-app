import React, { useState } from 'react'
import { apiModel } from '../../models/apiModel';

export const Login = () => {

    const [username, setUsername] = useState("");
    const [password, setPassword] = useState("");

    function submitHandler(e: React.FormEvent){
        e.preventDefault();
        const res = apiModel.login(username, password);
    }

    return (
        <>
            <h1>Login</h1>
            <form onSubmit={e =>submitHandler(e)}>
                <input type="text" onChange={e => setUsername(e.target.value)} />
                <input type="password" onChange={e => setPassword(e.target.value)} />
                <input type="submit" value="Log in" />
            </form>
        </>
    )
}
