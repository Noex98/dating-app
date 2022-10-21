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
    apiModel.getMatches().then(res => (
      
    )) 
  }, [])
  useEffect(() => {
    if (user?.data) {
      setHeightMin(user.data.preferences.heightMin);
      setHeightMax(user.data.preferences.heightMax);
      setAgeMin(user.data.preferences.ageMin);
      setAgeMax(user.data.preferences.ageMax);
      setGender(user.data.preferences.gender);
    }
  }, [user?.data])

  if (!user?.data) {
    return <></>
  }


  function selectChange(e: React.ChangeEvent<HTMLSelectElement>) {
    const value = e.target.value;
    if (value === "male" || value === "female") {
      setGender(value);
    }
  }

  function submitHandler(e: React.FormEvent) {
    e.preventDefault();
    const res = apiModel.setPreferences(heightMin, heightMax, ageMin, ageMax, gender)

  }


  return (
    <>
      <Header />
      <div>Matchlist</div>
      <form onSubmit={e => submitHandler(e)}>
        <input type="number" value={heightMin} onChange={e => setHeightMin(parseInt(e.target.value))} />
        <input type="number" value={heightMax} onChange={e => setHeightMax(parseInt(e.target.value))} />
        <input type="number" value={ageMin} onChange={e => setAgeMin(parseInt(e.target.value))} />
        <input type="number" value={ageMax} onChange={e => setAgeMax(parseInt(e.target.value))} />
        <select onChange={selectChange} defaultValue={gender}>
          <option value="male">Male</option>
          <option value="female">Female</option>
          <option value="all">all</option>
        </select><br />
        <input type="submit" value="Submit" />
      </form>
    </>
  )
}
