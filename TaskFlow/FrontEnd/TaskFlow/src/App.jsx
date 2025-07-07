import { Header } from "./components/basics/Header.jsx";

import { CoursesPage } from "./components/routes/CoursesPage.jsx";
import { Home } from "./components/routes/Home.jsx";
import { FormsPage } from "./components/routes/FormsPage.jsx";
import { CoursesElementsPage } from "./components/routes/CourseElementsPage.jsx";

import "./index.css";

import { SettingsPage } from "./components/routes/SettingsPage.jsx";
import { SchedulePage } from "./components/routes/SchedulePage.jsx";

import { AddEvent } from "./components/windows/AddEvent.jsx";
import {TaskDetail} from "./components/schedule/TaskDetail.jsx";

//Routes
import { Navigate, Route, Routes } from "react-router-dom";
import { WelcomePage } from "./components/routes/WelcomePage.jsx";
import { NotificationPage } from "./components/routes/NotificationPage.jsx";
import { InformationCoursePage } from "./components/routes/InformationCoursePage.jsx";
import { ProfilePage } from "./components/routes/ProfilePage.jsx";
import { Forms } from "./components/forms/Forms.jsx";
import { PrivateRoute } from "./components/routes/PrivateRoute.jsx";
import Cookies from 'js-cookie';

export function App() {

  const authData = Cookies.get("auth");

  return (
    <div>

    <div>
      <Header />
      {
        <Routes>
          <Route path="/" element={authData ? <Navigate to="/home" replace /> : <WelcomePage />} />
          <Route path="/formsPage" element={authData ? <Navigate to="/home" replace /> : <Forms />} />
          <Route path="/home" element={<PrivateRoute><Home /></PrivateRoute>} />
          <Route path="/coursesPage" element={<PrivateRoute><CoursesPage /></PrivateRoute>} />
          <Route path="/eventPage" element={<PrivateRoute><TaskDetail /></PrivateRoute>} />
          <Route path="/coursesElementsPage" element={<PrivateRoute><CoursesElementsPage /></PrivateRoute>} />
          <Route path="/settingsPage" element={<PrivateRoute><SettingsPage /></PrivateRoute>} />
          <Route path="/notificationPage" element={<PrivateRoute><NotificationPage /></PrivateRoute>} />
          <Route path="/informationCoursePage" element={<PrivateRoute><InformationCoursePage /></PrivateRoute>} />
          <Route path="/schedulePage" element={<PrivateRoute><SchedulePage /></PrivateRoute>} />
          <Route path="/profilePage" element={<PrivateRoute><ProfilePage /></PrivateRoute>} />
          <Route path="/*" element={<Navigate to="/" />} />
        </Routes>
      }
    </div>
      
    </div>
  );
}

export default App;
