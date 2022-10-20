import React, {useContext, useEffect, useState} from 'react'
import { Header, userContext } from '../../components';
import { apiModel } from '../../models/apiModel';

export const Profile = () => {
    const  [firstname, setFirstname] = useState("");
    const  [lastname, setLastname] = useState("");
    const  [height, setHeight] = useState(0);
    const  [gender, setGender] = useState<"male" | "female">("male");
    const  [birthday, setBirthday] = useState("");

    const user = useContext(userContext);

    useEffect(() => {
        if(user?.data){
            setFirstname(user.data.firstname);
            setLastname(user.data.lastname);
            setHeight(user.data.height);
            setGender(user.data.gender);
            setBirthday(user.data.birthday);
        }
    }, [user?.data])

    if(!user?.data){
        return <></>
    }
    

    const selectChange = (e: React.ChangeEvent<HTMLSelectElement>) => {
        const value = e.target.value;
        if (value === "male" || value === "female"){
            setGender(value);
        }
    };

    console.log(user.data);
    

    function submitHandler(e: React.FormEvent){
        e.preventDefault();
        apiModel.editUser(firstname, lastname, height, gender, birthday).then(res => {
            console.log(res);
            
        })
    }

    return (
        <>
            <Header />
            <h2>Profile</h2>
            <form onSubmit={e => submitHandler(e)}>
                <div>
                    <label >
                        <span>Firstname</span>
                        <input type="text" value={firstname} onChange={e => setFirstname(e.target.value)}/>
                    </label>
                </div>
                <div>
                    <label>
                        <span>Lastname</span>
                        <input type="text" value={lastname} onChange={e => setLastname(e.target.value)}/>
                    </label>
                </div>
                <div>
                    <label>
                        <span>Height</span>
                        <input type="number" min="1" max="999" value={height} onChange={e => setHeight(parseInt(e.target.value))}/>
                    </label>
                </div>
                <select onChange={selectChange}>
                    <option selected={gender === "female" ? true : false} value="female">Female</option>
                    <option selected={gender === "male" ? true : false} value="male">Male</option>
                </select><br />
                <input type="date"
                    min="0000-01-01" max="9999-12-31" value={birthday} onChange={e => setBirthday(e.target.value)}>
                </input>
                <div>
                    <input type="submit" value="Save Changes" />
                </div>
            </form>
        </>
    )
}
