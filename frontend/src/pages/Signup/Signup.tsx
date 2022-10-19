import React, {useState} from 'react'
import { apiModel } from '../../models/apiModel';

export const Signup = () => {
    const  [username, setUsername] = useState("");
    const  [password, setPassword] = useState("");
    const  [firstname, setFirstname] = useState("");
    const  [lastname, setLastname] = useState("");
    const  [height, setHeight] = useState(0);
    const  [gender, setGender] = useState<"male" | "female">("male");
    const  [birthday, setBirthday] = useState("");

 

    const selectChange = (e: React.ChangeEvent<HTMLSelectElement>) => {
        const value = e.target.value;
        if (value === "male" || value === "female"){
            setGender(value);
        }
    };

    function submitHandler(e: React.FormEvent){
        e.preventDefault();
        const res = apiModel.signup(username, password, firstname, lastname, height, gender, birthday);
    }

    return (
        <>
            <div>Signup</div>
            <form onSubmit={e => submitHandler(e)}>
                <input type="text" placeholder='Username' onChange={e => setUsername(e.target.value)}/> <br />
                <input type="password" placeholder='Password' onChange={e => setPassword(e.target.value)}/> <br />
                <br />
                <input type="text" placeholder='First Name' onChange={e => setFirstname(e.target.value)}/> <br />
                <input type="text" placeholder='Last Name' onChange={e => setLastname(e.target.value)}/> <br />
                <input type="number" min="1" max="999" placeholder='Height'onChange={e => setHeight(e.target.value)}/> <br />
                <select onChange={selectChange}>
                    <option value="male">Male</option>
                    <option value="female">Female</option>
                </select><br />
                <input type="date" id="start" name="trip-start"
                    value="0000-00-00"
                    min="2004-01-01" max="3000-12-31" onChange={e => setBirthday(e.target.value)}>
                </input>
                <input type="submit" value="Sign Up" />
            </form>
        </>
    )
}
