import { useContext } from 'react';
import { BrowserRouter, Routes, Route } from 'react-router-dom';
import { userContext } from './components';
import './global.css';

import { 
    Login,
    Profile,
    Matchlist,
    Signup 
} from './pages';

function App() {

    const user = useContext(userContext);

    return (
        <main>
            <BrowserRouter>

                {!user?.data && (
                    <Routes>
                        <Route path="/signup" element={<Signup />} />
                        <Route path="/*" element={<Login/>} />
                    </Routes>
                )}
                
                {user?.data && (
                    <Routes>
                        <Route path="/matchlist" element={<Matchlist />} />
                        <Route path="/*" element={<Profile />} />
                    </Routes>
                )}

            </BrowserRouter>
        </main>
    );
}

export default App;
