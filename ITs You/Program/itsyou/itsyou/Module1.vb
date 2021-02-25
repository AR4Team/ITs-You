Imports System.Console, System.Text.RegularExpressions
Module Module1
    Dim progname As String = "Checker"
    ' Change The url From Requests To Your Domain
    ' By n5y
    Sub Main()
        Write(" - Login" + vbCrLf + " - Register" + vbCrLf + " - Reddeam a Serial Key" + vbCrLf + " - Chose Number : ") : Dim num As String = ReadLine()
        If num = "1" Then
            Write(" - username : ") : Dim u As String = ReadLine()
            Write(" - Password : ") : Dim p As String = ReadLine()
            If Login(u, p) Then
                StartProgram()
            End If
        ElseIf num = "2" Then
            Write(" - username : ") : Dim u As String = ReadLine()
            Write(" - Password : ") : Dim p As String = ReadLine()
            Register(u, p)
        Else
            Write(" - username : ") : Dim u As String = ReadLine()
            Write(" - Enter Your Serial Key : ") : Dim skey As String = ReadLine()
            ReddenmS(skey, u)
        End If
    End Sub
    'By n5y
    Function StartProgram()
        MsgBox("Hello World")
        ' Your Code
    End Function
    'By n5y
    Function Login(u As String, p As String)
        Dim req As Net.HttpWebRequest = DirectCast(Net.WebRequest.Create($"http://localhost/itsyou/login.php?u={u}&p={p}"), Net.HttpWebRequest)
        req.Method = "GET"
        Dim Response As Net.HttpWebResponse = DirectCast(req.GetResponse, Net.HttpWebResponse)
        Dim reader As New IO.StreamReader(Response.GetResponseStream)
        Dim text As String = reader.ReadToEnd : reader.Dispose()
        reader.Close() : Response.Dispose()
        Response.Close()
        If text.Contains("Logged in") Then
            ForegroundColor = ConsoleColor.Green : WriteLine(" - Logged in")
            If text.Contains(progname) Then
                ForegroundColor = ConsoleColor.Green : WriteLine(" - You Are Good :)")
                Return True
            Else
                ForegroundColor = ConsoleColor.Red : WriteLine(" - You Dont Have This Program , Sorry")
                Write(" - Do you Have a Serial Number ? (y/n) : ") : ForegroundColor = ConsoleColor.Yellow
                If ReadLine() = "y" Then
                    ForegroundColor = ConsoleColor.White : Write(" - Enter Your Serial Key : ") : ForegroundColor = ConsoleColor.Yellow
                    ReddenmS(ReadLine, u)
                End If
                Return False
            End If
        Else
            ForegroundColor = ConsoleColor.Red : WriteLine(" - Login Filed")
            Return False
        End If
    End Function
    'By n5y
    Function Register(u As String, p As String)
        Dim req As Net.HttpWebRequest = DirectCast(Net.WebRequest.Create($"http://localhost/itsyou/register.php?u={u}&p={p}"), Net.HttpWebRequest)
        req.Method = "GET"
        Dim Response As Net.HttpWebResponse = DirectCast(req.GetResponse, Net.HttpWebResponse)
        Dim reader As New IO.StreamReader(Response.GetResponseStream)
        Dim text As String = reader.ReadToEnd : reader.Dispose()
        reader.Close() : Response.Dispose()
        Response.Close()
        If text.Contains("Registred Successful") Then
            ForegroundColor = ConsoleColor.Green : WriteLine(" - Registred Successfuly")
        Else
            ForegroundColor = ConsoleColor.Red : WriteLine(" - username is Alredy Taken")
        End If
        ReadLine()
    End Function
    'By n5y
    Function ReddenmS(skey As String, u As String)
        Dim req As Net.HttpWebRequest = DirectCast(Net.WebRequest.Create($"http://localhost/itsyou/serial.php?skey={skey}&u={u}"), Net.HttpWebRequest)
        req.Method = "GET"
        Dim Response As Net.HttpWebResponse = DirectCast(req.GetResponse, Net.HttpWebResponse)
        Dim reader As New IO.StreamReader(Response.GetResponseStream)
        Dim text As String = reader.ReadToEnd : reader.Dispose()
        reader.Close() : Response.Dispose()
        Response.Close()
        If text.Contains("is used") Then
            ForegroundColor = ConsoleColor.Red : WriteLine(" - Serial is used")
        ElseIf text.Contains("Serial is wrong") Then
            ForegroundColor = ConsoleColor.Red : WriteLine(" - Serial is Wrong")
        ElseIf text.Contains("username is wrong") Then
            ForegroundColor = ConsoleColor.Red : WriteLine(" - username is Wrong")
        ElseIf text.Contains("You Alredy Have This Program") Then
            ForegroundColor = ConsoleColor.Red : WriteLine(" - You Alredy Have This Program")
        ElseIf text.Contains("Successful") Then
            ForegroundColor = ConsoleColor.Green : WriteLine($" - The Serial Have Been used Successful , Now You have ""{Regex.Match(text, "is (.*)").Groups(1).Value}""")
        End If
        ReadLine()
    End Function
    'By n5y
End Module
