import { useState } from 'react';
import { BrowserRouter, Routes, Route } from 'react-router-dom';
import { AuthCheck } from './components';
import { 
    Login,
    Profile,
    Matchlist,
    Signup 
} from './pages';

function App() {

    const [user, setUser] = useState(null);

    return (
        <BrowserRouter>

        {!user && (
            <Routes>
                <Route path="/signup" element={<Signup />} />
                <Route path="/*" element={<Login />} />
            </Routes>
        )}

        {user && (
            <Routes>
                <Route path="/profile">
                    <AuthCheck>
                        <Profile />
                    </AuthCheck>
                </Route>

                <Route path="/matchlist">
                    <AuthCheck>
                        <Matchlist />
                    </AuthCheck>
                </Route>

            </Routes>
        )}

            
        </BrowserRouter>
    );
}

export default App;
