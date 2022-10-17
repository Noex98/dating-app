import { useContext } from 'react';
import { BrowserRouter, Routes, Route } from 'react-router-dom';
import { userContext } from './components';

import { 
    Login,
    Profile,
    Matchlist,
    Signup 
} from './pages';

function App() {

    const user = useContext(userContext)[0];

    return (
        <BrowserRouter>

            {!user && (
                <Routes>
                    <Route path="/signup" element={<Signup />} />
                    <Route path="/*" element={<Login/>} />
                </Routes>
            )}

            {user && (
                <Routes>
                    <Route path="/profile" element={<Profile />} />
                    <Route path="/matchlist" element={<Matchlist />} />
                </Routes>
            )}

            
        </BrowserRouter>
    );
}

export default App;
