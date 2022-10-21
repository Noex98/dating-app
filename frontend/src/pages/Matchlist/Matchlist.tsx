import React, { useContext, useEffect, useState } from 'react';
import { Header, userContext } from '../../components';
import { apiModel } from '../../models/apiModel';


export const Matchlist = () => {
  const [heightMin, setHeightMin] = useState(0);
  const [heightMax, setHeightMax] = useState(0);
  const [ageMin, setAgeMin] = useState(0);
  const [ageMax, setAgeMax] = useState(0);
  const [gender, setGender] = useState<"male" | "female" | "all">("male");

  const user = useContext(userContext);
  
  useEffect(() => {
    if(user?.data){
        setHeightMin(user.data.preferences.heightMin);
        setHeightMax(user.data.preferences.heightMax);
        setAgeMin(user.data.preferences.ageMin);
        setAgeMax(user.data.preferences.ageMax);
        setGender(user.data.preferences.gender);
    }
}, [user?.data])

if(!user?.data){
    return <></>
}


  const selectChange = (e: React.ChangeEvent<HTMLSelectElement>) => {
    const value = e.target.value;
    if (value === "male" || value === "female") {
      setGender(value);
    }
  };

  function submitHandler(e: React.FormEvent) {
    e.preventDefault();
    const res = apiModel.setPreferences(heightMin, heightMax, ageMin, ageMax, gender)

  }


  return (
    <>
        <Header />
      <h1>Matchlist</h1>
      <form onSubmit={e => submitHandler(e)}>
      <div className="input-option">
                    <label>Minimum height:</label>
        <input type="number" placeholder='Minimum Height' onChange={e => setHeightMin(parseInt(e.target.value))} />
        </div>
        <div className="input-option">
                    <label>Max height:</label>
        <input type="number" placeholder='Maximum Height' onChange={e => setHeightMax(parseInt(e.target.value))} />
        </div>
        <div className="input-option">
                    <label>Minimum age:</label>
        <input type="number" placeholder='Minimum Age' onChange={e => setAgeMin(parseInt(e.target.value))} />
        </div>
        <div className="input-option">
                    <label>Maximum age:</label>
        <input type="number" placeholder='Maximum Age' onChange={e => setAgeMax(parseInt(e.target.value))} />
        </div>
        <div className="input-option">
                    <label>Gender:</label>
        <select onChange={selectChange}>
          <option value="male">Male</option>
          <option value="female">Female</option>
        </select><br />
        </div>
        <input type="submit" value="Submit" className='button' />
      </form>
    </>
  )
}
