import { Header } from '../../components';
import { Matches, Preferences } from './components';


export const Matchlist = () => {
  return (
    <>
<<<<<<< HEAD
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
=======
      <Header />
      <Preferences />
      <Matches />
      <div>Matchlist</div>
>>>>>>> 64893e8235dd3d566b376d4c82cd881d227570c7
    </>
  )
}
